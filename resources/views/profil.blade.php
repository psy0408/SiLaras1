<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - SiLaras</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #0f0b3d;
            --secondary: #4f46e5;
            --secondary-light: #6366f1;
            --info: #3b82f6;
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
            --primary: #1a1f71;
            --primary-light: #2d3699;
            --accent: #5b4cdb;
            --accent-light: #7c6fe0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8ecff 100%);
            min-height: 100vh;
        }

        /* Header */
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
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .profile-icon i {
            color: white;
            font-size: 1.2rem;
        }

        .profile-icon:hover i {
            color: var(--primary);
        }

        .profile-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
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

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5% 4rem;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Page Title */
        .page-title {
            font-family: 'Sora', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2.5rem;
            text-align: center;
        }

        /* Profile Content Grid */
        .profile-content {
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 2.5rem;
            margin-bottom: 2.5rem;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 24px;
            padding: 3rem 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--accent) 0%, var(--accent-light) 100%);
        }

        /* Profile Photo Container */
        .profile-photo-wrapper {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 2rem;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            color: white;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .btn-edit-photo {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1.5rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .btn-edit-photo:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .profile-name {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.8rem;
        }

        .profile-email {
            font-size: 1.05rem;
            color: #64748b;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .profile-username {
            font-size: 1.05rem;
            color: #64748b;
            display: inline-block;
            background: linear-gradient(135deg, #f8f9ff 0%, #e8ecff 100%);
            padding: 0.6rem 1.2rem;
            border-radius: 12px;
            margin-top: 1rem;
        }

        .profile-username strong {
            color: var(--primary);
            font-weight: 700;
        }

        /* Photo Modal */
        .photo-modal {
            display: none;
            position: fixed;
            z-index: 10000;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            align-items: center;
            justify-content: center;
        }

        .photo-modal.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .photo-modal-content {
            background: white;
            border-radius: 28px;
            width: 90%;
            max-width: 550px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 2rem;
            box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            animation: slideUp 0.3s ease;
            position: relative;
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .photo-modal-header {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .close-modal-btn {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 36px;
            height: 36px;
            background: var(--gray-100);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
        }

        .close-modal-btn:hover {
            background: var(--gray-200);
            transform: rotate(90deg);
        }

        .photo-modal-header i {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }

        .photo-modal-header h3 {
            font-family: 'Sora', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .photo-modal-header p {
            color: var(--gray-500);
            font-size: 0.95rem;
        }

        /* Photo Preview */
        .photo-preview {
            margin-bottom: 2rem;
            text-align: center;
        }

        .photo-preview-circle {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            overflow: hidden;
            border: 4px solid var(--gray-200);
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .photo-preview-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo-preview-placeholder {
            font-size: 4rem;
            font-weight: 800;
            font-family: 'Sora', sans-serif;
            color: white;
        }

        /* File Upload Area */
        .file-upload-area {
            border: 2px dashed var(--gray-300);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 1.5rem;
            background: var(--gray-50);
        }

        .file-upload-area:hover {
            border-color: var(--secondary);
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
        }

        .file-upload-area.drag-over {
            border-color: var(--secondary);
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            transform: scale(1.02);
        }

        .file-upload-area i {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 0.75rem;
        }

        .file-upload-area p {
            color: var(--gray-600);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .file-upload-area small {
            color: var(--gray-400);
            font-size: 0.85rem;
        }

        .file-upload-area input[type="file"] {
            display: none;
        }

        /* Photo Actions */
        .photo-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .btn-upload,
        .btn-delete-photo {
            flex: 1;
            padding: 0.9rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-upload {
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-upload:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .btn-upload:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-delete-photo {
            background: var(--danger);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-delete-photo:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        /* Custom Confirm Modal Styles */
        .custom-confirm-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10000;
            animation: fadeIn 0.3s ease;
        }

        .custom-confirm-content {
            background: white;
            border-radius: 12px;
            padding: 30px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.3s ease;
        }

        .confirm-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .confirm-icon.warning {
            background: #fff3cd;
            color: #ff9800;
        }

        .confirm-icon.warning i {
            font-size: 40px;
        }

        .confirm-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .confirm-message {
            color: #666;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .confirm-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .confirm-btn-cancel,
        .confirm-btn-ok {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .confirm-btn-cancel {
            background: #f5f5f5;
            color: #666;
        }

        .confirm-btn-cancel:hover {
            background: #e0e0e0;
        }

        .confirm-btn-ok {
            background: #dc3545;
            color: white;
        }

        .confirm-btn-ok:hover {
            background: #c82333;
            transform: translateY(-1px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Notification Modal Styles (keep your existing styles) */
        .notification-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .notification-modal.active {
            opacity: 1;
            visibility: visible;
        }

        .notification-content {
            background: white;
            border-radius: 12px;
            padding: 30px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.3s ease;
        }

        .notification-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .notification-icon.success {
            background: #d4edda;
            color: #28a745;
        }

        .notification-icon.success i {
            font-size: 40px;
        }

        .notification-icon.error {
            background: #f8d7da;
            color: #dc3545;
        }

        .notification-icon.error i {
            font-size: 40px;
        }

        .notification-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .notification-message {
            color: #666;
            margin-bottom: 25px;
        }

        .notification-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .notification-btn:hover {
            background: #0056b3;
            transform: translateY(-1px);
        }

        /* Success Alert */
        .success-alert {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border: 2px solid #86efac;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
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

        .success-alert i {
            color: #065f46;
            font-size: 1.3rem;
        }

        .success-alert span {
            color: #065f46;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* Info Section */
        .info-section {
            background: white;
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-section h3 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 1.6rem;
            margin-bottom: 2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .info-section h3::before {
            content: '';
            width: 4px;
            height: 35px;
            background: linear-gradient(180deg, var(--accent) 0%, var(--accent-light) 100%);
            border-radius: 2px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 0;
            border-bottom: 2px solid #f1f5f9;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 700;
            color: var(--primary);
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .info-value {
            color: #64748b;
            font-size: 1.05rem;
            font-weight: 600;
        }

        .info-badge {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        /* Action Button */
        .buttons-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .btn-logout {
            width: 100%;
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: white;
            padding: 1.2rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        /* Logout Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10001;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(4px);
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 24px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            animation: bounceIn 0.5s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }

            50% {
                transform: scale(1.05);
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-content i {
            font-size: 4rem;
            color: var(--danger);
            margin-bottom: 1rem;
        }

        .modal-content h3 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 1.6rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .modal-content p {
            color: #64748b;
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #64748b;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .btn-cancel:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-confirm {
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.95rem;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark) 0%, #0f172a 100%);
            color: white;
            padding: 3rem 5% 1.5rem;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-brand h3 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, white 0%, var(--accent-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .footer-brand p {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 1.3rem;
        }

        .social-link:hover {
            background: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(91, 76, 219, 0.3);
        }

        .footer-section h4 {
            font-family: 'Sora', sans-serif;
            font-size: 1.05rem;
            margin-bottom: 1.2rem;
            font-weight: 700;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.7rem;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: var(--accent-light);
            transform: translateX(3px);
        }

        .footer-location {
            color: #94a3b8;
            line-height: 1.7;
            font-size: 0.9rem;
        }

        .footer-location strong {
            color: white;
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .footer-contact-info {
            color: #94a3b8;
            line-height: 1.7;
            font-size: 0.9rem;
        }

        .footer-contact-info strong {
            color: white;
            display: block;
            margin-bottom: 0.3rem;
            font-size: 0.95rem;
        }

        .footer-contact-info a {
            color: var(--accent-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-contact-info a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        /* Responsive */
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

            .profile-content {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 2rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 640px) {
            .container {
                padding: 0 1rem 3rem;
            }

            .profile-card,
            .info-section {
                padding: 2rem 1.5rem;
            }

            .profile-name {
                font-size: 1.6rem;
            }

            .page-title {
                font-size: 1.8rem;
            }

            .photo-modal-content {
                padding: 1.5rem;
            }

            .photo-actions {
                flex-direction: column;
            }
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
            <a href="/report">Buat Laporan</a>
            <a href="/riwayat">Riwayat</a>
            <a href="/about">Tentang Kami</a>
            <div class="profile-icon">
                <a href="/profil"><i class="fas fa-user"></i></a>
            </div>
        </nav>
        <div class="mobile-nav" id="mobileNav">
            <a href="/home"><i class="fas fa-home"></i> Beranda</a>
            <a href="/report"><i class="fas fa-plus-circle"></i> Buat Laporan</a>
            <a href="/riwayat"><i class="fas fa-history"></i> Riwayat</a>
            <a href="/about"><i class="fas fa-info-circle"></i> Tentang Kami</a>
            <a href="/profil" class="active"><i class="fas fa-user"></i> Profil</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Page Title -->
        <h1 class="page-title">Profil Saya</h1>

        <!-- Profile Content Grid -->
        <div class="profile-content">
            <!-- Profile Card -->
            <div class="profile-card">
                <div class="profile-photo-wrapper">
                    @if (auth()->user()->profile_photo && file_exists(public_path('storage/' . auth()->user()->profile_photo)))
                        <div class="profile-avatar">
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profile Photo"
                                id="profilePhotoDisplay">
                        </div>
                    @else
                        <div class="profile-avatar" id="profileInitialDisplay">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-email">
                    <i class="fas fa-envelope"></i>
                    <span>{{ auth()->user()->email }}</span>
                </div>
                <div class="profile-username">
                    <strong><i class="fas fa-user-tag"></i> Username:</strong> {{ auth()->user()->username }}
                </div>
                <button class="btn-edit-photo" onclick="openPhotoModal()">
                    <i class="fas fa-camera"></i>
                    Edit Foto Profil
                </button>
            </div>

            <!-- Additional Info -->
            <div class="info-section">
                <h3>Informasi Akun</h3>
                <div class="info-item">
                    <span class="info-label">
                        <i class="fas fa-user-check"></i>
                        <span>Status</span>
                    </span>
                    <span class="info-badge">
                        {{ auth()->user()->role === 'user' ? 'Siswa Aktif' : 'Admin' }}
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Bergabung Sejak</span>
                    </span>
                    <span class="info-value">
                        {{ auth()->user()->created_at->translatedFormat('F Y') }}
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Total Laporan</span>
                    </span>
                    <span class="info-value">
                        {{ $totalReports }} Laporan
                    </span>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="buttons-container">
            <button class="btn-logout" onclick="showLogoutModal()">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </div>
    </div>

    <!-- Photo Upload Modal -->
    <div class="photo-modal" id="photoModal">
        <div class="photo-modal-content">
            <button class="close-modal-btn" onclick="closePhotoModal()">
                <i class="fas fa-times"></i>
            </button>

            <div class="photo-modal-header">
                <i class="fas fa-camera-retro"></i>
                <h3>Edit Foto Profil</h3>
                <p>Upload foto profil baru atau hapus yang sudah ada</p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="success-alert" id="successAlert">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Photo Preview -->
            <div class="photo-preview">
                <div class="photo-preview-circle" id="previewCircle">
                    @if (auth()->user()->profile_photo && file_exists(public_path('storage/' . auth()->user()->profile_photo)))
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Current Photo"
                            id="modalCurrentPhoto">
                    @else
                        <div class="photo-preview-placeholder" id="modalPlaceholder">
                            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <small style="color: #64748b;">Foto profil saat ini</small>
            </div>

            <!-- Upload Form -->
            <form action="{{ route('profile.upload-photo') }}" method="POST" enctype="multipart/form-data"
                id="uploadForm">
                @csrf

                <!-- File Upload Area -->
                <div class="file-upload-area" id="fileUploadArea"
                    onclick="document.getElementById('photoInput').click()">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Klik atau drag & drop foto di sini</p>
                    <small>Format: JPG, PNG, GIF | Maks: 2MB</small>
                    <input type="file" id="photoInput" name="profile_photo"
                        accept="image/jpeg,image/png,image/gif" onchange="previewNewImage(event)">
                </div>

                <!-- Action Buttons -->
                <div class="photo-actions">
                    <button type="submit" class="btn-upload" id="uploadBtn" disabled>
                        <i class="fas fa-upload"></i>
                        Upload Foto Baru
                    </button>

                    @if (auth()->user()->profile_photo && file_exists(public_path('storage/' . auth()->user()->profile_photo)))
                        <button type="button" class="btn-delete-photo" onclick="confirmDeletePhoto()">
                            <i class="fas fa-trash-alt"></i>
                            Hapus Foto
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Notification Modal - Add this somewhere in your layout file -->
    <div class="notification-modal" id="notificationModal">
        <div class="notification-content">
            <div class="notification-icon" id="notificationIcon"></div>
            <div class="notification-title" id="notificationTitle"></div>
            <div class="notification-message" id="notificationMessage"></div>
            <button class="notification-btn" onclick="closeNotification()">
                <i class="fas fa-check"></i> OK
            </button>
        </div>
    </div>

    <!-- Delete Photo Form (Hidden) -->
    <form id="deletePhotoForm" action="{{ route('profile.delete-photo') }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Logout Confirmation Modal -->
    <div class="modal" id="logoutModal">
        <div class="modal-content">
            <i class="fas fa-sign-out-alt"></i>
            <h3>Konfirmasi Logout</h3>
            <p>Apakah Anda yakin ingin keluar dari akun? Anda perlu login kembali untuk mengakses sistem.</p>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="hideLogoutModal()">Batal</button>
                <button class="btn-confirm" onclick="confirmLogout()">Ya, Logout</button>
            </div>
        </div>
    </div>

    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
        @csrf
    </form>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>SiLaras</h3>
                    <p>Sistem Laporan Sarana Sekolah yang memudahkan siswa melaporkan kerusakan fasilitas dengan cepat,
                        mudah, dan transparan.</p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/?locale=id_ID" class="social-link" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="social-link" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://x.com/" class="social-link" title="X">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a href="mailto:smkn1cs@gmail.com" class="social-link" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4>
                        <i class="fas fa-compass"></i>
                        Navigasi
                    </h4>
                    <ul class="footer-links">
                        <li><a href="/home"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="/report"><i class="fas fa-chevron-right"></i> Buat Laporan</a></li>
                        <li><a href="/riwayat"><i class="fas fa-chevron-right"></i> Riwayat</a></li>
                        <li><a href="/about"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                        <li><a href="/profil"><i class="fas fa-chevron-right"></i> Profil</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>
                        <i class="fas fa-map-marker-alt"></i>
                        Lokasi
                    </h4>
                    <div class="footer-location">
                        <strong>SMK Negeri 1 Cisarua</strong>
                        Jl. Kolonel Masturi No.300, RT.04/RW.14<br>
                        Jambudipa, Kec. Cisarua<br>
                        Kabupaten Bandung Barat<br>
                        Jawa Barat 40551
                    </div>
                </div>

                <div class="footer-section">
                    <h4>
                        <i class="fas fa-headset"></i>
                        Kontak
                    </h4>
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
        // Mobile menu toggle
        function toggleMenu() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileNav = document.getElementById('mobileNav');
            const menuToggle = document.querySelector('.mobile-menu-toggle');

            if (mobileNav && menuToggle && !mobileNav.contains(event.target) && !menuToggle.contains(event
                    .target)) {
                mobileNav.classList.remove('active');
            }
        });

        // Open Photo Modal
        function openPhotoModal() {
            const modal = document.getElementById('photoModal');
            modal.classList.add('active');
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }

        // Close Photo Modal
        function closePhotoModal() {
            const modal = document.getElementById('photoModal');
            modal.classList.remove('active');
            // Reset preview
            const previewImg = document.getElementById('newPreviewImg');
            if (previewImg) previewImg.remove();
            document.getElementById('uploadBtn').disabled = true;
            document.getElementById('photoInput').value = '';
            // Restore body scroll
            document.body.style.overflow = '';
        }

        // Preview new image
        function previewNewImage(event) {
            const file = event.target.files[0];

            if (file) {
                // Validate file size (max 2MB)
                if (file.size > 2048 * 1024) {
                    alert('File terlalu besar! Maksimal 2MB');
                    event.target.value = '';
                    return;
                }

                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('File harus berupa gambar! Format yang didukung: JPG, PNG, GIF');
                    event.target.value = '';
                    return;
                }

                const reader = new FileReader();
                const previewCircle = document.getElementById('previewCircle');

                reader.onload = function(e) {
                    // Remove existing preview image if any
                    const existingImg = document.getElementById('newPreviewImg');
                    if (existingImg) existingImg.remove();

                    // Create new image element
                    const img = document.createElement('img');
                    img.id = 'newPreviewImg';
                    img.src = e.target.result;
                    img.alt = 'Preview';
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';

                    // Clear circle and add new image
                    previewCircle.innerHTML = '';
                    previewCircle.appendChild(img);

                    // Enable upload button
                    document.getElementById('uploadBtn').disabled = false;
                };

                reader.readAsDataURL(file);
            }
        }

        // Confirm delete photo
        function confirmDeletePhoto() {
            showCustomConfirm(
                'Konfirmasi Hapus Foto',
                'Apakah Anda yakin ingin menghapus foto profil?',
                function() {
                    document.getElementById('deletePhotoForm').submit();
                }
            );
        }

        function showCustomConfirm(title, message, onConfirm) {
            const confirmModal = document.createElement('div');
            confirmModal.className = 'custom-confirm-modal';
            confirmModal.innerHTML = `
        <div class="custom-confirm-content">
            <div class="confirm-icon warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="confirm-title">${title}</div>
            <div class="confirm-message">${message}</div>
            <div class="confirm-buttons">
                <button class="confirm-btn-cancel" onclick="this.closest('.custom-confirm-modal').remove()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="confirm-btn-ok" id="confirmOkBtn">
                    <i class="fas fa-trash-alt"></i> Hapus
                </button>
            </div>
        </div>
    `;

            document.body.appendChild(confirmModal);

            // Add event listener for confirm button
            const confirmBtn = confirmModal.querySelector('#confirmOkBtn');
            confirmBtn.addEventListener('click', function() {
                confirmModal.remove();
                if (onConfirm) onConfirm();
            });

            // Close when clicking outside
            confirmModal.addEventListener('click', function(e) {
                if (e.target === confirmModal) {
                    confirmModal.remove();
                }
            });
        }

        // Notification Functions
        function showNotification(title, message, type = 'success') {
            const modal = document.getElementById('notificationModal');
            const icon = document.getElementById('notificationIcon');
            const titleEl = document.getElementById('notificationTitle');
            const messageEl = document.getElementById('notificationMessage');

            if (type === 'success') {
                icon.innerHTML = '<i class="fas fa-check-circle"></i>';
                icon.className = 'notification-icon success';
            } else {
                icon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
                icon.className = 'notification-icon error';
            }

            titleEl.textContent = title;
            messageEl.textContent = message;
            modal.classList.add('active');
        }

        function closeNotification() {
            document.getElementById('notificationModal').classList.remove('active');
        }

        // Drag and Drop functionality
        const uploadArea = document.getElementById('fileUploadArea');
        const photoInput = document.getElementById('photoInput');

        if (uploadArea) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                uploadArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight(e) {
                uploadArea.classList.add('drag-over');
            }

            function unhighlight(e) {
                uploadArea.classList.remove('drag-over');
            }

            uploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                photoInput.files = files;

                // Trigger preview
                const event = new Event('change', {
                    bubbles: true
                });
                photoInput.dispatchEvent(event);
            }
        }

        // Auto open modal if success message exists and auto close alert
        @if (session('success'))
            window.addEventListener('DOMContentLoaded', function() {
                openPhotoModal();
                // Auto close success message after 3 seconds
                setTimeout(function() {
                    const alert = document.getElementById('successAlert');
                    if (alert) {
                        alert.style.animation = 'fadeOut 0.3s ease';
                        setTimeout(() => {
                            if (alert && alert.remove) alert.remove();
                        }, 300);
                    }
                }, 3000);
            });
        @endif

        // Refresh page after form submission to update photo
        document.getElementById('uploadForm')?.addEventListener('submit', function(e) {
            // Show loading state
            const uploadBtn = document.getElementById('uploadBtn');
            if (uploadBtn) {
                uploadBtn.disabled = true;
                uploadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengupload...';
            }
        });

        // Logout Modal Functions
        function showLogoutModal() {
            document.getElementById('logoutModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function hideLogoutModal() {
            document.getElementById('logoutModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        function confirmLogout() {
            localStorage.removeItem('userName');
            localStorage.removeItem('userEmail');
            localStorage.removeItem('userId');
            document.getElementById('logoutForm').submit();
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const photoModal = document.getElementById('photoModal');
            const logoutModal = document.getElementById('logoutModal');

            if (event.target === photoModal) {
                closePhotoModal();
            }
            if (event.target === logoutModal) {
                hideLogoutModal();
            }
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const photoModal = document.getElementById('photoModal');
                const logoutModal = document.getElementById('logoutModal');

                if (photoModal && photoModal.classList.contains('active')) {
                    closePhotoModal();
                }
                if (logoutModal && logoutModal.classList.contains('active')) {
                    hideLogoutModal();
                }
            }
        });
    </script>
</body>

</html>
