<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Closed</title>
    <style>
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(232, 217, 235, 0.99);
        --gold: rgba(171, 103, 186, 0.78);
        --text-dark: #2c3e50;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        min-height: 100vh;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        position: relative;
        overflow: hidden;
    }

    /* Animated background circles */
    body::before,
    body::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: var(--gold);
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    body::before {
        width: 300px;
        height: 300px;
        top: -100px;
        left: -100px;
    }

    body::after {
        width: 400px;
        height: 400px;
        bottom: -150px;
        right: -150px;
        animation-delay: 3s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) scale(1);
        }

        50% {
            transform: translateY(-30px) scale(1.1);
        }
    }

    .container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        max-width: 600px;
        width: 100%;
        max-height: 98vh;
        overflow-y: auto;
        padding: 30px 25px;
        text-align: center;
        position: relative;
        z-index: 1;
        animation: slideUp 0.6s ease-out;
    }

    .container::-webkit-scrollbar {
        width: 6px;
    }

    .container::-webkit-scrollbar-track {
        background: var(--light-blue);
        border-radius: 10px;
    }

    .container::-webkit-scrollbar-thumb {
        background: var(--gold);
        border-radius: 10px;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, var(--light-blue) 0%, var(--gold) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .icon {
        width: 40px;
        height: 40px;
        stroke: var(--primary-blue);
        stroke-width: 2;
        fill: none;
    }

    h1 {
        color: var(--primary-blue);
        font-size: 1.8em;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.2;
    }

    .subtitle {
        color: var(--accent-blue);
        font-size: 1em;
        margin-bottom: 20px;
        font-weight: 500;
        line-height: 1.4;
    }

    .message {
        color: var(--text-dark);
        font-size: 0.95em;
        line-height: 1.5;
        margin-bottom: 25px;
        opacity: 0.9;
    }

    .info-box {
        background: var(--light-blue);
        border-left: 4px solid var(--gold);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
        text-align: left;
    }

    .info-box h3 {
        color: var(--primary-blue);
        margin-bottom: 10px;
        font-size: 1.1em;
    }

    .info-box p {
        color: var(--text-dark);
        line-height: 1.6;
        margin: 0;
    }

    .btn-group {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 15px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1em;
        transition: all 0.3s ease;
        display: inline-block;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(70, 12, 82, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(70, 12, 82, 0.4);
    }

    .btn-secondary {
        background: white;
        color: var(--primary-blue);
        border: 2px solid var(--gold);
    }

    .btn-secondary:hover {
        background: var(--light-blue);
        transform: translateY(-2px);
    }

    .contact-info {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid var(--light-blue);
    }

    .contact-info p {
        color: var(--text-dark);
        margin: 10px 0;
    }

    .contact-info a {
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .contact-info a:hover {
        color: var(--gold);
    }

    @media (max-width: 768px) {
        .container {
            padding: 40px 25px;
        }

        h1 {
            font-size: 2em;
        }

        .subtitle {
            font-size: 1em;
        }

        .btn-group {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="icon-wrapper">
            <svg class="icon" viewBox="0 0 24 24">
                <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
            </svg>
        </div>

        <h1>Registration Closed</h1>
        <p class="subtitle">We're Sorry, But Registrations Are Currently Closed</p>

        <!-- <div class="message">
            <p>Thank you for your interest! Unfortunately, we have reached our capacity and are no longer accepting new
                registrations at this time.</p>
        </div> -->

        <div class="info-box">
            <!-- <h3>📅 Want to Stay Updated?</h3> -->
            <p>Thank you for your interest! Unfortunately, we have reached our capacity and are no longer accepting new
                registrations at this time.</p>
        </div>

        <div class="btn-group">
            <a href="index.php" class="btn btn-primary">Back to Home</a>
            <a href="contact.php" class="btn btn-secondary">Contact Us</a>
        </div>

        <div class="contact-info">
            <p><strong>Need Help?</strong></p>
            <p>Contact us at <a href="mailto:support@example.com">ieeeconference@nielit.ac.in</a></p>
            <p>or call <a href="tel:+1234567890">(+91) 9650339961 / 9910719256</a></p>
        </div>
    </div>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Closed</title>
    <style>
    :root {
        --primary-blue: rgba(70, 12, 82, 0.99);
        --accent-blue: rgba(91, 2, 109, 0.99);
        --light-blue: rgba(232, 217, 235, 0.99);
        --gold: rgba(171, 103, 186, 0.78);
        --text-dark: #2c3e50;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        min-height: 100vh;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        position: relative;
        overflow: auto;
    }

    /* Animated background circles */
    body::before,
    body::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: var(--gold);
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    body::before {
        width: 300px;
        height: 300px;
        top: -100px;
        left: -100px;
    }

    body::after {
        width: 400px;
        height: 400px;
        bottom: -150px;
        right: -150px;
        animation-delay: 3s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) scale(1);
        }

        50% {
            transform: translateY(-30px) scale(1.1);
        }
    }

    .container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        max-width: 600px;
        width: 100%;
        max-height: 95vh;
        overflow-y: auto;
        padding: 50px 40px;
        text-align: center;
        position: relative;
        z-index: 1;
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .icon-wrapper {
        width: 120px;
        height: 120px;
        margin: 0 auto 30px;
        background: linear-gradient(135deg, var(--light-blue) 0%, var(--gold) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .icon {
        width: 60px;
        height: 60px;
        stroke: var(--primary-blue);
        stroke-width: 2;
        fill: none;
    }

    h1 {
        color: var(--primary-blue);
        font-size: 2.5em;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .subtitle {
        color: var(--accent-blue);
        font-size: 1.2em;
        margin-bottom: 30px;
        font-weight: 500;
    }

    .message {
        color: var(--text-dark);
        font-size: 1.1em;
        line-height: 1.8;
        margin-bottom: 40px;
        opacity: 0.9;
    }

    .info-box {
        background: var(--light-blue);
        border-left: 4px solid var(--gold);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
        text-align: left;
    }

    .info-box h3 {
        color: var(--primary-blue);
        margin-bottom: 10px;
        font-size: 1.1em;
    }

    .info-box p {
        color: var(--text-dark);
        line-height: 1.6;
        margin: 0;
    }

    .btn-group {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        padding: 15px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1em;
        transition: all 0.3s ease;
        display: inline-block;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-blue) 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(70, 12, 82, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(70, 12, 82, 0.4);
    }

    .btn-secondary {
        background: white;
        color: var(--primary-blue);
        border: 2px solid var(--gold);
    }

    .btn-secondary:hover {
        background: var(--light-blue);
        transform: translateY(-2px);
    }

    .contact-info {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 2px solid var(--light-blue);
    }

    .contact-info p {
        color: var(--text-dark);
        margin: 10px 0;
    }

    .contact-info a {
        color: var(--accent-blue);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .contact-info a:hover {
        color: var(--gold);
    }

    @media (max-width: 768px) {
        .container {
            padding: 40px 25px;
        }

        h1 {
            font-size: 2em;
        }

        .subtitle {
            font-size: 1em;
        }

        .btn-group {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="icon-wrapper">
            <svg class="icon" viewBox="0 0 24 24">
                <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                <path d="M12.5 7H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
            </svg>
        </div>

        <h1>Registration Closed</h1>
        <p class="subtitle">We're Sorry, But Registrations Are Currently Closed</p>

        <div class="message">
            <p>Thank you for your interest! Unfortunately, we have reached our capacity and are no longer accepting new
                registrations at this time.</p>
        </div>

        <div class="info-box">
            <h3>📅 Want to Stay Updated?</h3>
            <p>Registration will open again soon! Subscribe to our newsletter or follow us on social media to be
                notified when registrations reopen.</p>
        </div>

        <div class="btn-group">
            <a href="index.php" class="btn btn-primary">Back to Home</a>
            <a href="notify-me.php" class="btn btn-secondary">Notify Me</a>
        </div>

        <div class="contact-info">
            <p><strong>Need Help?</strong></p>
            <p>Contact us at <a href="mailto:support@example.com">support@example.com</a></p>
            <p>or call <a href="tel:+1234567890">+1 (234) 567-890</a></p>
        </div>
    </div>
</body>

</html> -->