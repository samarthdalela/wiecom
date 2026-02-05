<?php
// classes/FileUploadHandler.php
class FileUploadHandler
{
    private $uploadDirectory;
    private $allowedExtensions;
    private $maxFileSize;
    private $baseUrl;

    public function __construct($uploadDir = 'uploads/papers/', $maxSize = 3145728, $baseUrl = '')
    {
        $this->uploadDirectory = $uploadDir;
        $this->allowedExtensions = ['pdf', 'doc', 'docx'];
        $this->maxFileSize = $maxSize; // 3MB default
        $this->baseUrl = $baseUrl ?: 'https://www.nielit.ac.in/UPWIECON2026/UserFiles/';

        // Create upload directory if it doesn't exist
        if (!is_dir($this->uploadDirectory)) {
            mkdir($this->uploadDirectory, 0755, true);
        }
    }

    public function uploadFile($file)
    {
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            return [
                'success' => false,
                'message' => 'No file uploaded or upload error occurred'
            ];
        }

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName = $file['tmp_name'];

        // Get file extension
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validate file extension
        if (!in_array($fileExtension, $this->allowedExtensions)) {
            return [
                'success' => false,
                'message' => 'Invalid file format. Only PDF, DOC, and DOCX files are allowed.'
            ];
        }

        // Validate file size
        if ($fileSize > $this->maxFileSize) {
            return [
                'success' => false,
                'message' => 'File size must be less than 3MB'
            ];
        }

        // Validate MIME type for additional security
        $allowedMimeTypes = [
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $fileTmpName);
        finfo_close($finfo);

        // Some servers might return different MIME types, so we'll be flexible
        $validMimeTypes = array_values($allowedMimeTypes);
        $validMimeTypes[] = 'application/octet-stream'; // Fallback for some servers

        if (!in_array($mimeType, $validMimeTypes)) {
            // Additional check for file content (basic)
            $fileContent = file_get_contents($fileTmpName, false, null, 0, 1024);
            if (
                strpos($fileContent, '%PDF') !== 0 &&
                strpos($fileContent, 'PK') !== 0 &&
                strpos($fileContent, "\xD0\xCF\x11\xE0") !== 0
            ) {
                return [
                    'success' => false,
                    'message' => 'File content does not match allowed formats'
                ];
            }
        }

        // Generate unique filename similar to C# code
        $guidPart = substr(uniqid(), 0, 4);
        $cleanFileName = preg_replace('/[^a-zA-Z0-9._-]/', '_', strtoupper($fileName));
        $newFileName = $guidPart . '_' . time() . '_' . $cleanFileName;
        $uploadPath = $this->uploadDirectory . $newFileName;

        // Move uploaded file
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            return [
                'success' => true,
                'filename' => $newFileName,
                'path' => $uploadPath,
                'url' => $this->baseUrl . $newFileName,
                'size' => $fileSize,
                'type' => $fileExtension
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to upload file to server'
            ];
        }
    }

    public function deleteFile($filename)
    {
        $filePath = $this->uploadDirectory . $filename;
        if (file_exists($filePath)) {
            return unlink($filePath);
        }
        return false;
    }

    public function getFileInfo($filename)
    {
        $filePath = $this->uploadDirectory . $filename;
        if (file_exists($filePath)) {
            return [
                'exists' => true,
                'size' => filesize($filePath),
                'modified' => filemtime($filePath),
                'url' => $this->baseUrl . $filename
            ];
        }
        return ['exists' => false];
    }

    public function validateFileType($filename)
    {
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        return in_array($extension, $this->allowedExtensions);
    }

    public function formatFileSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, 2) . ' ' . $units[$pow];
    }
}
?>