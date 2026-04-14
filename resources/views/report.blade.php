<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buat Laporan - SiLaras</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e1b4b;
            --primary-dark: #0f0b3d;
            --primary-light: #2e2a6b;
            --secondary: #4f46e5;
            --secondary-light: #6366f1;
            --accent: #8b5cf6;
            --success: #10b981;
            --success-light: #d1fae5;
            --warning: #f59e0b;
            --warning-light: #fef3c7;
            --danger: #ef4444;
            --danger-light: #fee2e2;
            --info: #3b82f6;
            --info-light: #dbeafe;
            --dark: #0f172a;
            --light: #f8fafc;
            --gray-50: #f9fafb;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --shadow-colored: 0 4px 20px rgba(79, 70, 229, 0.15);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6f7ff 0%, #edf0ff 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.6;
        }

        /* Header Styles */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 5%;
            box-shadow: var(--shadow-md);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(79, 70, 229, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo img {
            height: 40px;
        }

        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.2s;
            padding: 0.5rem 0;
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        nav a:hover::after,
        nav a.active::after {
            width: 100%;
        }

        nav a:hover,
        nav a.active {
            color: var(--secondary);
        }

        .profile-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: var(--shadow-colored);
        }

        .profile-icon a {
            color: white;
            font-size: 1.2rem;
            padding: 0;
        }

        .profile-icon a::after {
            display: none;
        }

        .profile-icon:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.3);
        }

        .mobile-menu-toggle {
            display: none;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            color: white;
            border: none;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: var(--shadow-colored);
        }

        .mobile-nav {
            display: none;
        }

        /* Category Modal */
        .category-modal {
            display: flex;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .category-modal.hidden {
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .category-modal-content {
            background: white;
            padding: 3rem;
            border-radius: 32px;
            max-width: 750px;
            width: 90%;
            animation: slideUpFade 0.4s ease;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(79, 70, 229, 0.1);
            max-height: 90vh;
            overflow-y: auto;

        }

        @keyframes slideUpFade {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .modal-header h2 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .modal-header p {
            color: var(--gray-500);
            font-size: 1.1rem;
            max-width: 450px;
            margin: 0 auto;
        }

        .category-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .category-card {
            background: white;
            border: 2px solid var(--gray-200);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .category-card:hover {
            transform: translateY(-8px);
            border-color: var(--secondary);
            box-shadow: var(--shadow-xl);
        }

        .category-card:hover::before {
            opacity: 1;
        }

        .category-card.selected {
            border-color: var(--secondary);
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            box-shadow: var(--shadow-xl);
        }

        .category-card.selected::after {
            content: '✓';
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: bold;
            box-shadow: var(--shadow);
            z-index: 2;
        }

        .category-icon {
            font-size: 4.5rem;
            margin-bottom: 1.2rem;
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 4px 10px rgba(79, 70, 229, 0.2));
        }

        .category-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.8rem;
            position: relative;
            z-index: 1;
        }

        .category-desc {
            font-size: 0.95rem;
            color: var(--gray-500);
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .btn-modal {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 16px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back {
            background: var(--gray-100);
            color: var(--gray-600);
        }

        .btn-back:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
        }

        .btn-continue {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            box-shadow: var(--shadow-colored);
        }

        .btn-continue:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }

        .btn-continue:disabled {
            background: var(--gray-300);
            cursor: not-allowed;
            opacity: 0.7;
        }

        /* Main Container (Form) */
        .container {
            max-width: 800px;
            margin: 2rem auto 4rem;
            background: white;
            padding: 3rem;
            border-radius: 32px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(79, 70, 229, 0.1);
            display: none;
        }

        .container.visible {
            display: block;
            animation: slideUpFade 0.5s ease;
        }

        .form-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .form-header h2 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--gray-500);
            font-size: 1rem;
        }

        .form-header::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
            border-radius: 2px;
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 2.5rem;
            box-shadow: var(--shadow-colored);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .category-badge i {
            font-size: 1.2rem;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 2rem;
        }

        label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.7rem;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.95rem;
        }

        label i {
            color: var(--secondary);
            font-size: 1rem;
            width: 18px;
        }

        .required-star {
            color: var(--danger);
            margin-left: 3px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 2px solid var(--gray-200);
            border-radius: 16px;
            font-size: 0.95rem;
            transition: all 0.3s;
            font-family: inherit;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        input:read-only,
        select:disabled {
            background: var(--gray-50);
            border-color: var(--gray-200);
            color: var(--gray-600);
            cursor: not-allowed;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .error-text {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .error-text i {
            font-size: 0.8rem;
        }

        /* File Upload */
        .file-upload-wrapper {
            position: relative;
            width: 100%;
        }

        .file-upload-input {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .file-upload-button {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            color: var(--primary);
            padding: 1.2rem;
            border: 2px dashed var(--secondary);
            border-radius: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            transition: all 0.3s;
            width: 100%;
            font-weight: 600;
        }

        .file-upload-button:hover {
            background: linear-gradient(135deg, #e8ecff 0%, #dbeafe 100%);
            border-color: var(--primary);
            transform: scale(1.02);
        }

        .file-upload-button i {
            font-size: 1.5rem;
            color: var(--secondary);
        }

        .file-info {
            margin-top: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--gray-500);
        }

        .file-info i {
            color: var(--success);
        }

        .image-preview {
            margin-top: 1.5rem;
            border-radius: 20px;
            overflow: hidden;
            display: none;
            box-shadow: var(--shadow-lg);
            background: var(--gray-100);
            position: relative;
        }

        .image-preview img {
            width: 100%;
            max-height: 350px;
            object-fit: contain;
            background: #f8f9fa;
        }

        .preview-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            padding: 1rem;
            display: flex;
            justify-content: flex-end;
        }

        .remove-image {
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 12px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow);
        }

        .remove-image:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 1.3rem;
            border: none;
            border-radius: 20px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            box-shadow: var(--shadow-colored);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .submit-btn:hover:not(:disabled) {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(79, 70, 229, 0.4);
        }

        .submit-btn:disabled {
            background: var(--gray-300);
            cursor: not-allowed;
        }

        .submit-btn i {
            font-size: 1.2rem;
            transition: transform 0.3s;
        }

        .submit-btn:hover i {
            transform: translateX(5px);
        }

        /* Notification Modal */
        .notification-modal {
            display: none;
            position: fixed;
            z-index: 10000;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .notification-modal.active {
            display: flex;
        }

        .notification-content {
            background: white;
            padding: 3rem;
            border-radius: 32px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            animation: popIn 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        @keyframes popIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            80% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .notification-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
        }

        .notification-icon.success {
            color: var(--success);
        }

        .notification-icon.error {
            color: var(--danger);
        }

        .notification-title {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .notification-message {
            font-size: 1rem;
            color: var(--gray-500);
            margin-bottom: 2.5rem;
            line-height: 1.7;
        }

        .notification-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .notification-btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 16px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            justify-content: center;
        }

        .btn-home {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            box-shadow: var(--shadow-colored);
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }

        .btn-new-report {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-new-report:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-retry {
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-retry:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark) 0%, #1a1b3b 100%);
            color: white;
            padding: 4rem 5% 2rem;
            margin-top: 4rem;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, rgba(79, 70, 229, 0) 70%);
            border-radius: 50%;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1.2fr 1.2fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand h3 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, white 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .footer-brand p {
            color: var(--gray-400);
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 1.2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-link:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }

        .footer-section h4 {
            font-family: 'Sora', sans-serif;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--gray-400);
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--secondary-light);
            transform: translateX(5px);
        }

        .footer-links a i {
            font-size: 0.8rem;
            opacity: 0;
            transition: all 0.3s;
        }

        .footer-links a:hover i {
            opacity: 1;
        }

        .footer-location,
        .footer-contact-info {
            color: var(--gray-400);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .footer-location strong,
        .footer-contact-info strong {
            color: white;
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .footer-contact-info a {
            color: var(--secondary-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-contact-info a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            text-align: center;
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            nav {
                display: none;
            }

            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-nav.active {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 1.5rem;
                box-shadow: var(--shadow-lg);
                border-bottom: 1px solid var(--gray-200);
                animation: slideDown 0.3s ease;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .mobile-nav a {
                padding: 0.8rem 1rem;
                color: var(--gray-700);
                text-decoration: none;
                font-weight: 600;
                border-radius: 12px;
                transition: all 0.3s;
            }

            .mobile-nav a:hover,
            .mobile-nav a.active {
                background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
                color: var(--secondary);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .category-options {
                grid-template-columns: 1fr;
            }

            .container {
                margin: 1rem;
                padding: 2rem 1.5rem;
            }

            .form-header h2 {
                font-size: 1.8rem;
            }

            .category-modal-content {
                padding: 2rem;
            }

            .modal-header h2 {
                font-size: 1.8rem;
            }

            .notification-actions {
                flex-direction: column;
            }

            .notification-btn {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .social-links {
                justify-content: center;
            }

            .footer-section {
                text-align: center;
            }

            .footer-links a {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 1.6rem;
            }

            .category-badge {
                width: 100%;
                justify-content: center;
            }

            .modal-buttons {
                flex-direction: column;
            }

            .btn-modal {
                width: 100%;
                justify-content: center;
            }

            .notification-content {
                padding: 2rem;
            }

            .notification-title {
                font-size: 1.6rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Progress Indicator */
        .progress-steps {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-400);
            font-weight: 500;
        }

        .step.active {
            color: var(--secondary);
        }

        .step.completed {
            color: var(--success);
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .step.active .step-number {
            background: var(--secondary);
            color: white;
        }

        .step.completed .step-number {
            background: var(--success);
            color: white;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo-silaras.png') }}" alt="SiLaras Logo">
        </div>
        <button class="mobile-menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </button>
        <nav id="desktopNav">
            <a href="/home">Beranda</a>
            <a href="/report" class="active">Buat Laporan</a>
            <a href="/riwayat">Riwayat</a>
            <a href="/about">Tentang Kami</a>
            <div class="profile-icon">
                <a href="/profil"><i class="fas fa-user"></i></a>
            </div>
        </nav>
        <nav class="mobile-nav" id="mobileNav">
            <a href="/home"><i class="fas fa-home"></i> Beranda</a>
            <a href="/report" class="active"><i class="fas fa-plus-circle"></i> Buat Laporan</a>
            <a href="/riwayat"><i class="fas fa-history"></i> Riwayat</a>
            <a href="/about"><i class="fas fa-info-circle"></i> Tentang Kami</a>
            <a href="/profil"><i class="fas fa-user"></i> Profil</a>
        </nav>
    </header>

    <!-- Category Selection Modal -->
    <div class="category-modal" id="categoryModal">
        <div class="category-modal-content">
            <div class="modal-header">
                <h2>Pilih Kategori Laporan</h2>
                <p>Pilih jenis kerusakan yang ingin Anda laporkan</p>
            </div>

            <div class="category-options">
                <div class="category-card" onclick="selectCategory('sarana')" id="card-sarana">
                    <div class="category-icon"><i class="fas fa-chair"></i></div>
                    <div class="category-title">Sarana</div>
                    <div class="category-desc">Barang bergerak seperti meja, kursi, AC, proyektor, komputer, dan
                        perlengkapan lainnya</div>
                </div>

                <div class="category-card" onclick="selectCategory('prasarana')" id="card-prasarana">
                    <div class="category-icon"><i class="fas fa-school"></i></div>
                    <div class="category-title">Prasarana</div>
                    <div class="category-desc">Bangunan & infrastruktur seperti ruang kelas, toilet, gedung, lapangan,
                        dan fasilitas lainnya</div>
                </div>
            </div>

            <div class="modal-buttons">
                <button class="btn-modal btn-back" onclick="window.location.href='/home'">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </button>
                <button class="btn-modal btn-continue" id="btnContinue" onclick="continueToForm()" disabled>
                    Lanjutkan
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Container (Form) -->
    <div class="container" id="formContainer">
        <!-- Progress Steps -->
        <div class="progress-steps">
            <div class="step completed">
                <span class="step-number">1</span>
                <span>Pilih Kategori</span>
            </div>
            <div class="step active">
                <span class="step-number">2</span>
                <span>Isi Detail</span>
            </div>
            <div class="step">
                <span class="step-number">3</span>
                <span>Konfirmasi</span>
            </div>
        </div>

        <div class="form-header">
            <h2>Form Laporan</h2>
            <p>Lengkapi data berikut dengan benar</p>
        </div>

        <div style="text-align: center;">
            <span class="category-badge" id="categoryBadge">
                <i class="fas fa-tag"></i>
                <span id="categoryBadgeText"></span>
            </span>
        </div>

        <!-- Form -->
        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Hidden Category Input -->
            <input type="hidden" name="kategori" id="kategori" value="">

            <!-- Personal Information Section -->
            <div
                style="background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%); padding: 1.5rem; border-radius: 20px; margin-bottom: 2rem;">
                <h3
                    style="display: flex; align-items: center; gap: 0.5rem; color: var(--primary); margin-bottom: 1rem; font-size: 1.1rem;">
                    <i class="fas fa-user-circle"></i>
                    Informasi Pribadi
                </h3>

                <div class="form-group">
                    <label>
                        <i class="fas fa-user"></i>
                        Nama Pelapor
                        <span class="required-star">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ auth()->user()->name }}" readonly>
                    @error('nama')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-id-card"></i>
                        Username
                        <span class="required-star">*</span>
                    </label>
                    <input type="text" name="username" value="{{ auth()->user()->username }}" readonly>
                    @error('username')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-graduation-cap"></i>
                        Kelas
                        <span class="required-star">*</span>
                    </label>
                    <select name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="X" {{ old('kelas') == 'X' ? 'selected' : '' }}>X (Sepuluh)</option>
                        <option value="XI" {{ old('kelas') == 'XI' ? 'selected' : '' }}>XI (Sebelas)</option>
                        <option value="XII" {{ old('kelas') == 'XII' ? 'selected' : '' }}>XII (Dua Belas)</option>
                    </select>
                    @error('kelas')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-book"></i>
                        Jurusan
                        <span class="required-star">*</span>
                    </label>
                    <select name="jurusan" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>RPL (Rekayasa Perangkat
                            Lunak)</option>
                        <option value="PH" {{ old('jurusan') == 'PH' ? 'selected' : '' }}>PH (Perhotelan)</option>
                        <option value="MPLB" {{ old('jurusan') == 'MPLB' ? 'selected' : '' }}>MPLB (Manajemen
                            Perkantoran)</option>
                        <option value="TKR" {{ old('jurusan') == 'TKR' ? 'selected' : '' }}>TKR (Teknik Kendaraan
                            Ringan)</option>
                    </select>
                    @error('jurusan')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Report Details Section -->
            <div
                style="background: linear-gradient(135deg, #fef9e7 0%, #fff3d6 100%); padding: 1.5rem; border-radius: 20px; margin-bottom: 2rem;">
                <h3
                    style="display: flex; align-items: center; gap: 0.5rem; color: var(--warning); margin-bottom: 1rem; font-size: 1.1rem;">
                    <i class="fas fa-clipboard-list"></i>
                    Detail Laporan
                </h3>

                <!-- Dynamic: Jenis Sarana/Prasarana -->
                <div class="form-group" id="jenisGroup">
                    <label id="jenisLabel">
                        <i class="fas fa-cog"></i>
                        Jenis
                        <span class="required-star">*</span>
                    </label>
                    <select name="sarana" id="sarana" required onchange="cekLainnya()">
                        <option value="">-- Pilih --</option>
                    </select>
                    @error('sarana')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" id="saranaLainnyaGroup" style="display: none;">
                    <label>
                        <i class="fas fa-pen"></i>
                        Jenis Lainnya
                        <span class="required-star">*</span>
                    </label>
                    <input type="text" name="sarana_lainnya" id="sarana_lainnya"
                        placeholder="Masukkan jenis sarana/prasarana" value="{{ old('sarana_lainnya') }}">
                    @error('sarana_lainnya')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-exclamation-triangle"></i>
                        Tingkat Kerusakan
                        <span class="required-star">*</span>
                    </label>
                    <select name="tingkat_kerusakan" required>
                        <option value="">-- Pilih Tingkat Kerusakan --</option>
                        <option value="Ringan" {{ old('tingkat_kerusakan') == 'Ringan' ? 'selected' : '' }}>🟢 Ringan
                        </option>
                        <option value="Sedang" {{ old('tingkat_kerusakan') == 'Sedang' ? 'selected' : '' }}>🟡 Sedang
                        </option>
                        <option value="Berat" {{ old('tingkat_kerusakan') == 'Berat' ? 'selected' : '' }}>🟠 Berat
                        </option>
                    </select>
                    @error('tingkat_kerusakan')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-map-marker-alt"></i>
                        Lokasi
                        <span class="required-star">*</span>
                    </label>
                    <input type="text" name="lokasi" placeholder="Contoh: Ruang Kelas X RPL 1, Lantai 2"
                        value="{{ old('lokasi') }}" required>
                    @error('lokasi')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-align-left"></i>
                        Deskripsi Kerusakan
                        <span class="required-star">*</span>
                    </label>
                    <textarea name="deskripsi"
                        placeholder="Jelaskan kondisi kerusakan secara detail... Contoh: Meja bagian kaki patah, kursi tidak bisa dipakai, dll"
                        required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-camera"></i>
                        Foto Bukti Kerusakan
                        <span style="color: var(--gray-500); font-weight: normal; margin-left: 0.5rem;">(Opsional, maks
                            2MB, format JPG/PNG)</span>
                    </label>
                    <div class="file-upload-wrapper">
                        <input type="file" name="foto_bukti" id="foto_bukti" class="file-upload-input"
                            accept="image/jpeg,image/jpg,image/png" onchange="previewImage(this)">
                        <div class="file-upload-button">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span id="file-label">Pilih Foto</span>
                        </div>
                    </div>
                    <div class="file-info" id="file-info" style="display: none;">
                        <i class="fas fa-check-circle"></i>
                        <span id="file-name"></span>
                    </div>
                    <div class="image-preview" id="image-preview">
                        <img id="preview-img" src="" alt="Preview">
                        <div class="preview-overlay">
                            <button type="button" class="remove-image" onclick="removeImage()">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </div>
                    </div>
                    @error('foto_bukti')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <i class="fas fa-calendar-alt"></i>
                        Tanggal Laporan
                        <span class="required-star">*</span>
                    </label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="error-text"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i>
                Kirim Laporan
                <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>

    <!-- Notification Modal -->
    <div class="notification-modal" id="notificationModal">
        <div class="notification-content">
            <div class="notification-icon" id="notificationIcon"></div>
            <div class="notification-title" id="notificationTitle"></div>
            <div class="notification-message" id="notificationMessage"></div>
            <div class="notification-actions" id="notificationActions"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>SiLaras</h3>
                    <p>Sistem Laporan Sarana Sekolah yang memudahkan siswa melaporkan kerusakan fasilitas dengan cepat,
                        mudah, dan transparan.</p>
                    <div class="social-links">
                        <a href="#" class="social-link" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="mailto:smkn1cs@gmail.com" class="social-link" title="Email"><i
                                class="fas fa-envelope"></i></a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4><i class="fas fa-compass"></i> Navigasi</h4>
                    <ul class="footer-links">
                        <li><a href="/home"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="/report"><i class="fas fa-chevron-right"></i> Buat Laporan</a></li>
                        <li><a href="/riwayat"><i class="fas fa-chevron-right"></i> Riwayat</a></li>
                        <li><a href="/about"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                        <li><a href="/profil"><i class="fas fa-chevron-right"></i> Profil</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Lokasi</h4>
                    <div class="footer-location">
                        <strong>SMK Negeri 1 Cisarua</strong>
                        Jl. Kolonel Masturi No.300, RT.04/RW.14<br>
                        Jambudipa, Kec. Cisarua<br>
                        Kabupaten Bandung Barat<br>
                        Jawa Barat 40551
                    </div>
                </div>

                <div class="footer-section">
                    <h4><i class="fas fa-headset"></i> Kontak</h4>
                    <div class="footer-contact-info">
                        <strong>Telepon:</strong>
                        (022) 876-678<br><br>
                        <strong>Email:</strong>
                        <a href="mailto:smkn1cs@gmail.com">smkn1cs@gmail.com</a><br><br>
                        <strong>Jam Operasional:</strong>
                        Senin - Jumat<br>
                        07:00 - 16:00 WIB
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© {{ date('Y') }} SiLaras - Sistem Laporan Sarana Sekolah. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        let selectedCategory = '';

        const saranaOptions = [
            'Meja', 'Kursi', 'Papan Tulis', 'Proyektor',
            'Monitor', 'AC', 'Kipas Angin', 'Komputer',
            'Printer', 'Lemari', 'Lainnya'
        ];

        const prasaranaOptions = [
            'Ruang Kelas', 'Toilet/WC', 'Gedung', 'Lantai',
            'Dinding', 'Atap', 'Pintu', 'Jendela',
            'Plafon', 'Tangga', 'Lapangan', 'Lainnya'
        ];

        // Mobile menu toggle
        function toggleMenu() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileNav = document.getElementById('mobileNav');
            const menuToggle = document.querySelector('.mobile-menu-toggle');

            if (mobileNav && menuToggle &&
                !mobileNav.contains(event.target) &&
                !menuToggle.contains(event.target)) {
                mobileNav.classList.remove('active');
            }
        });

        // Check for success/error messages from server
        @if (session('success'))
            showSuccessNotification();
        @endif

        @if ($errors->any())
            showErrorNotification();
        @endif

        function showSuccessNotification() {
            document.getElementById('categoryModal').style.display = 'none';
            document.getElementById('formContainer').style.display = 'none';

            const modal = document.getElementById('notificationModal');
            const icon = document.getElementById('notificationIcon');
            const title = document.getElementById('notificationTitle');
            const message = document.getElementById('notificationMessage');
            const actions = document.getElementById('notificationActions');

            icon.innerHTML = '<i class="fas fa-check-circle"></i>';
            icon.className = 'notification-icon success';
            title.textContent = 'Berhasil!';
            message.textContent = 'Laporan Anda berhasil dikirim. Admin akan segera meninjau laporan Anda.';

            actions.innerHTML = `
                <button class="notification-btn btn-home" onclick="window.location.href='/home'">
                    <i class="fas fa-home"></i>
                    Kembali ke Home
                </button>
                <button class="notification-btn btn-new-report" onclick="createNewReport()">
                    <i class="fas fa-plus-circle"></i>
                    Buat Laporan Lagi
                </button>
            `;

            modal.classList.add('active');
        }

        function showErrorNotification() {
            document.getElementById('categoryModal').style.display = 'none';

            const modal = document.getElementById('notificationModal');
            const icon = document.getElementById('notificationIcon');
            const title = document.getElementById('notificationTitle');
            const message = document.getElementById('notificationMessage');
            const actions = document.getElementById('notificationActions');

            icon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
            icon.className = 'notification-icon error';
            title.textContent = 'Gagal!';
            message.textContent = 'Terjadi kesalahan saat mengirim laporan. Mohon periksa kembali form Anda.';

            actions.innerHTML = `
                <button class="notification-btn btn-home" onclick="window.location.href='/home'">
                    <i class="fas fa-home"></i>
                    Kembali ke Home
                </button>
                <button class="notification-btn btn-retry" onclick="closeNotification()">
                    <i class="fas fa-edit"></i>
                    Perbaiki Laporan
                </button>
            `;

            modal.classList.add('active');

            // Show form if there are errors
            document.getElementById('categoryModal').classList.add('hidden');
            document.getElementById('formContainer').classList.add('visible');
        }

        function closeNotification() {
            document.getElementById('notificationModal').classList.remove('active');
        }

        function createNewReport() {
            window.location.href = '/report';
        }

        // Select category card
        function selectCategory(category) {
            selectedCategory = category;
            document.getElementById('kategori').value = category;
            document.querySelectorAll('.category-card').forEach(card => {
                card.classList.remove('selected');
            });
            document.getElementById('card-' + category).classList.add('selected');
            document.getElementById('btnContinue').disabled = false;
        }

        // Continue to form
        function continueToForm() {
            if (!selectedCategory) return;

            document.getElementById('categoryModal').classList.add('hidden');
            document.getElementById('formContainer').classList.add('visible');
            document.getElementById('kategori').value = selectedCategory;

            const badge = document.getElementById('categoryBadge');
            const badgeText = document.getElementById('categoryBadgeText');

            if (selectedCategory === 'sarana') {
                badgeText.textContent = 'Laporan Sarana';
                badge.innerHTML = '<i class="fas fa-tag"></i> <span>Laporan Sarana</span>';
            } else {
                badgeText.textContent = 'Laporan Prasarana';
                badge.innerHTML = '<i class="fas fa-tag"></i> <span>Laporan Prasarana</span>';
            }

            const label = document.getElementById('jenisLabel');
            label.innerHTML = selectedCategory === 'sarana' ?
                '<i class="fas fa-cog"></i> Jenis Sarana <span class="required-star">*</span>' :
                '<i class="fas fa-cog"></i> Jenis Prasarana <span class="required-star">*</span>';

            const select = document.getElementById('sarana');
            select.innerHTML = '<option value="">-- Pilih --</option>';

            const options = selectedCategory === 'sarana' ? saranaOptions : prasaranaOptions;
            options.forEach(opt => {
                const option = document.createElement('option');
                option.value = opt;
                option.textContent = opt;
                select.appendChild(option);
            });
        }

        function cekLainnya() {
            const sarana = document.getElementById("sarana").value;
            const saranaLainnyaGroup = document.getElementById("saranaLainnyaGroup");
            const inputLainnya = document.getElementById("sarana_lainnya");

            if (sarana === "Lainnya") {
                saranaLainnyaGroup.style.display = "block";
                inputLainnya.required = true;
            } else {
                saranaLainnyaGroup.style.display = "none";
                inputLainnya.required = false;
                inputLainnya.value = "";
            }
        }

        function previewImage(input) {
            const fileInfo = document.getElementById('file-info');
            const fileNameDiv = document.getElementById('file-name');
            const fileLabel = document.getElementById('file-label');
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');

            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (file.size > 2048000) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    input.value = '';
                    return;
                }

                if (!['image/jpeg', 'image/jpg', 'image/png'].includes(file.type)) {
                    alert('Format file harus JPG, JPEG, atau PNG!');
                    input.value = '';
                    return;
                }

                fileNameDiv.textContent = file.name;
                fileLabel.innerHTML = '<i class="fas fa-check"></i> ' + file.name.substring(0, 30) + (file.name.length >
                    30 ? '...' : '');
                fileInfo.style.display = 'flex';

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const input = document.getElementById('foto_bukti');
            const fileInfo = document.getElementById('file-info');
            const fileLabel = document.getElementById('file-label');
            const preview = document.getElementById('image-preview');

            input.value = '';
            fileInfo.style.display = 'none';
            fileLabel.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> Pilih Foto';
            preview.style.display = 'none';
        }

        // Add animation on form submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span class="loading"></span> Mengirim...';
            submitBtn.disabled = true;
        });
    </script>
</body>

</html>
