<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Management - SiLaras</title>
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
            display: flex;
            color: var(--gray-800);
        }

        /* Sidebar - Modern dengan ikon (sama dengan halaman admin lain) */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 120%);
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
            transition: all 0.3s;
        }

        .sidebar-logo {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sidebar-logo::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg,
                    transparent 30%,
                    rgba(255, 255, 255, 0.1) 50%,
                    transparent 70%);
            animation: shine 3s infinite;
        }

        .sidebar-logo img {
            height: 50px;
            width: auto;
            object-fit: contain;
            z-index: 1;
            padding: 6px 12px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            100% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }

        .sidebar-menu {
            flex: 1;
            padding: 1.5rem 0;
        }

        .menu-item {
            padding: 0.9rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 0.3rem 0;
        }

        .menu-item i {
            width: 24px;
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.6);
            transition: all 0.3s;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: white;
            color: white;
        }

        .menu-item:hover i {
            color: white;
            transform: translateX(3px);
        }

        .menu-item.active {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-left-color: white;
            position: relative;
        }

        .menu-item.active::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 20px;
            background: white;
            border-radius: 3px 0 0 3px;
        }

        .menu-item.active i {
            color: white;
        }

        .sidebar-logout {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        .logout-btn {
            width: 100%;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.9), #dc2626);
            color: white;
            padding: 0.9rem;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        }

        .logout-btn i {
            font-size: 1rem;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 1.5rem;
            width: calc(100% - 280px);
        }

        /* Header */
        .header {
            background: white;
            padding: 1.5rem 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(180deg, var(--secondary), var(--accent));
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-family: 'Sora', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-badge {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--secondary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid rgba(79, 70, 229, 0.2);
        }

        .header-badge i {
            color: var(--secondary);
        }

        /* profil */
        .user-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 12px;
            object-fit: cover;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            font-weight: 700;
            overflow: hidden;
            flex-shrink: 0;
        }

        /* Modal untuk hapus foto profil */
        .photo-preview-delete {
            text-align: center;
            margin: 1rem 0;
        }

        .photo-preview-delete img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--gray-200);
            margin-bottom: 1rem;
        }

        .photo-preview-delete .avatar-placeholder {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 3rem;
            font-weight: 700;
            color: white;
            border: 3px solid var(--gray-200);
        }

        /* Top Bar */
        .top-bar {
            background: white;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .btn-add-user {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 0.9rem 2rem;
            border: none;
            border-radius: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
            box-shadow: var(--shadow-colored);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .btn-add-user i {
            font-size: 1.1rem;
        }

        .btn-add-user:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .search-box {
            flex: 1;
            max-width: 400px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1rem;
        }

        .search-box input {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 2.8rem;
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            font-size: 0.95rem;
            transition: all 0.3s;
            font-family: 'Inter', sans-serif;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .filter-info {
            color: var(--gray-500);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-info i {
            color: var(--secondary);
        }

        /* User Section */
        .user-section {
            background: white;
            border-radius: 24px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .section-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-title i {
            color: var(--secondary);
            font-size: 1.2rem;
        }

        .total-badge {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 16px;
        }

        .user-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .user-table thead {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
        }

        .user-table th {
            padding: 1rem 1rem;
            text-align: left;
            font-weight: 700;
            color: var(--primary);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .user-table th:first-child {
            border-radius: 16px 0 0 0;
        }

        .user-table th:last-child {
            border-radius: 0 16px 0 0;
        }

        .user-table td {
            padding: 1rem 1rem;
            border-bottom: 1px solid var(--gray-200);
            color: var(--gray-600);
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .user-table tbody tr {
            transition: all 0.2s;
        }

        .user-table tbody tr:hover {
            background: var(--gray-50);
        }

        .user-table tbody tr:last-child td {
            border-bottom: none;
        }

        .empty-row td {
            text-align: center;
            padding: 3rem 1rem !important;
            color: var(--gray-400);
            font-size: 1rem;
        }

        .empty-row i {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--gray-300);
        }

        /* User Info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            font-weight: 700;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 0.95rem;
        }

        .user-email {
            font-size: 0.75rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 0.2rem;
        }

        .username-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.2rem;
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            color: var(--secondary);
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.4rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-edit,
        .btn-reset {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            white-space: nowrap;
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            box-shadow: var(--shadow-colored);
        }

        .btn-reset {
            background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
        }

        .btn-edit:hover,
        .btn-reset:hover {
            transform: translateY(-2px);
        }

        .btn-edit:hover {
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .btn-reset:hover {
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
        }

        .btn-delete {
            background: var(--gray-100);
            border: none;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--gray-600);
            font-size: 1rem;
        }

        .btn-delete:hover {
            background: var(--danger);
            color: white;
            transform: scale(1.1);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 24px;
            width: 90%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
            animation: modalPop 0.3s ease;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        @keyframes modalPop {
            0% {
                transform: scale(0.9);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-header {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--gray-100);
        }

        .modal-header i {
            font-size: 1.5rem;
            color: var(--secondary);
        }

        .modal-header h3 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 1.4rem;
            font-weight: 700;
        }

        .modal-header.warning i {
            color: var(--warning);
        }

        .modal-header.danger i {
            color: var(--danger);
        }

        .confirm-text {
            color: var(--gray-600);
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .confirm-text strong {
            color: var(--primary);
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-group label i {
            color: var(--secondary);
            margin-right: 0.3rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .form-group input:disabled {
            background: var(--gray-100);
            color: var(--gray-600);
            cursor: not-allowed;
            border-color: var(--gray-200);
        }

        .form-group input.input-error {
            border-color: var(--danger);
            background: var(--danger-light);
        }

        .error-text {
            color: var(--danger);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.2rem;
        }

        .error-text i {
            font-size: 0.8rem;
        }

        /* Modal Buttons */
        .modal-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: flex-end;
        }

        .btn-cancel {
            background: var(--gray-100);
            color: var(--gray-600);
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cancel:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
        }

        .btn-save {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-colored);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .btn-save:disabled {
            background: var(--gray-400);
            cursor: not-allowed;
            box-shadow: none;
        }

        .btn-confirm-delete {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .btn-confirm-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
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
            padding: 2rem;
            border-radius: 24px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            animation: bounceIn 0.4s ease;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(79, 70, 229, 0.1);
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

        .notification-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            font-size: 2.5rem;
        }

        .notification-icon.success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: var(--success);
        }

        .notification-icon.error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: var(--danger);
        }

        .notification-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .notification-message {
            font-size: 0.95rem;
            color: var(--gray-500);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .notification-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 0.8rem 2.5rem;
            border: none;
            border-radius: 14px;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s;
            box-shadow: var(--shadow-colored);
        }

        .notification-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 200;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1.3rem;
            box-shadow: var(--shadow-colored);
            transition: all 0.3s;
        }

        .mobile-menu-toggle:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 90;
            backdrop-filter: blur(3px);
        }

        .overlay.active {
            display: block;
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

        /* Responsive */
        @media (max-width: 968px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 1rem;
            }

            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.8rem;
            }

            .top-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-add-user {
                width: 100%;
                justify-content: center;
            }

            .search-box {
                max-width: 100%;
            }

            .user-table th,
            .user-table td {
                padding: 0.8rem;
                font-size: 0.8rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-edit,
            .btn-reset {
                width: 100%;
                justify-content: center;
            }

            .btn-delete {
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .header h1 {
                font-size: 1.5rem;
            }

            .modal-content {
                padding: 1.5rem;
            }

            .modal-buttons {
                flex-direction: column;
            }

            .btn-cancel,
            .btn-save,
            .btn-confirm-delete {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo-silaras-putih.png') }}" alt="SiLaras Logo">
        </div>

        <nav class="sidebar-menu">
            <a href="/admin" class="menu-item">
                <i class="fas fa-chart-pie"></i>
                <span>Dasbor</span>
            </a>
            <a href="/admin/report-ad" class="menu-item">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>
            <a href="/admin/riwayat-ad" class="menu-item">
                <i class="fas fa-history"></i>
                <span>Riwayat</span>
            </a>
            <a href="/admin/user-ad" class="menu-item active">
                <i class="fas fa-users"></i>
                <span>Pengguna</span>
            </a>
        </nav>

        <div class="sidebar-logout">
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="button" class="logout-btn" onclick="openModal('logoutModal')">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <h1>Pengelola Pengguna</h1>
                <div class="header-badge">
                    <i class="fas fa-users"></i>
                    <span>Total User: <span id="totalUsers">0</span></span>
                </div>
            </div>
        </div>

        <!-- Top Bar -->
        <div class="top-bar">
            <button class="btn-add-user" onclick="openAddModal()">
                <i class="fas fa-plus-circle"></i>
                Tambah User Baru
            </button>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari user...">
            </div>
            <div class="filter-info">
                <i class="fas fa-info-circle"></i>
                <span>Ketik untuk mencari user</span>
            </div>
        </div>

        <!-- User Section -->
        <div class="user-section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fas fa-user-circle"></i>
                    <span>Daftar Pengguna</span>
                </div>
                <span class="total-badge" id="filteredCount">0</span>
            </div>

            <div class="table-container">
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <tr class="empty-row">
                            <td colspan="4">
                                <i class="fas fa-users"></i>
                                <div>Memuat data...</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal: Tambah User -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-user-plus"></i>
                <h3>Tambah User Baru</h3>
            </div>

            <div class="form-group">
                <label><i class="fas fa-user"></i> Nama Lengkap</label>
                <input type="text" id="addName" placeholder="Masukkan nama lengkap">
                <div class="error-text" id="addNameErr"></div>
            </div>

            <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="addEmail" placeholder="contoh@email.com">
                <div class="error-text" id="addEmailErr"></div>
            </div>

            <div class="form-group">
                <label><i class="fas fa-id-card"></i> Username</label>
                <input type="text" id="addUsername" placeholder="Masukan Username">
                <div class="error-text" id="addUsernameErr"></div>
            </div>

            <div class="form-group">
                <label><i class="fas fa-lock"></i> Password</label>
                <input type="password" id="addPassword" placeholder="Minimal 8 karakter">
                <div class="error-text" id="addPasswordErr"></div>
            </div>

            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('addModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn-save" id="addSaveBtn" onclick="submitAdd()">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </div>

    <!-- Modal: Edit User -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-user-edit"></i>
                <h3>Edit User</h3>
            </div>

            <input type="hidden" id="editId">

            <div class="form-group">
                <label><i class="fas fa-user"></i> Nama Lengkap</label>
                <input type="text" id="editName" disabled>
            </div>

            <div class="form-group">
                <label><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="editEmail" placeholder="contoh@email.com">
                <div class="error-text" id="editEmailErr"></div>
            </div>

            <div class="form-group">
                <label><i class="fas fa-id-card"></i> Username</label>
                <input type="text" id="editUsername" placeholder="Nomor Induk Siswa Nasional">
                <div class="error-text" id="editUsernameErr"></div>
            </div>

            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('editModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn-save" id="editSaveBtn" onclick="submitEdit()">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </div>

    <!-- Modal: Reset Password -->
    <div class="modal" id="resetModal">
        <div class="modal-content">
            <div class="modal-header warning">
                <i class="fas fa-key"></i>
                <h3>Reset Password</h3>
            </div>

            <p class="confirm-text" id="resetText"></p>
            <input type="hidden" id="resetId">

            <div class="form-group">
                <label><i class="fas fa-lock"></i> Password Baru</label>
                <input type="password" id="resetPass" placeholder="Minimal 8 karakter">
                <div class="error-text" id="resetPassErr"></div>
            </div>

            <div class="form-group">
                <label><i class="fas fa-lock"></i> Konfirmasi Password</label>
                <input type="password" id="resetPassConfirm" placeholder="Ulangi password baru">
                <div class="error-text" id="resetPassConfirmErr"></div>
            </div>

            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('resetModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn-save" id="resetSaveBtn" onclick="submitReset()">
                    <i class="fas fa-key"></i> Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Modal: Konfirmasi Hapus -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header danger">
                <i class="fas fa-trash-alt"></i>
                <h3>Konfirmasi Hapus</h3>
            </div>

            <p class="confirm-text" id="deleteText"></p>
            <input type="hidden" id="deleteId">

            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('deleteModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn-confirm-delete" onclick="submitDelete()">
                    <i class="fas fa-trash-alt"></i> Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <!-- Modal: Hapus Foto Profil -->
    <div class="modal" id="deletePhotoModal">
        <div class="modal-content">
            <div class="modal-header danger">
                <i class="fas fa-trash-alt"></i>
                <h3>Hapus Foto Profil</h3>
            </div>
            <p class="confirm-text" id="deletePhotoText"></p>
            <div class="photo-preview-delete" id="photoPreviewDelete">
                <!-- Preview foto akan ditampilkan di sini -->
            </div>
            <input type="hidden" id="deletePhotoUserId">
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('deletePhotoModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn-confirm-delete" onclick="submitDeletePhoto()">
                    <i class="fas fa-trash-alt"></i> Ya, Hapus Foto
                </button>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal" id="logoutModal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header danger">
                <i class="fas fa-sign-out-alt"></i>
                <h3>Konfirmasi Logout</h3>
            </div>

            <p class="confirm-text">Apakah Anda yakin ingin keluar dari dashboard?</p>

            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('logoutModal')">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn-confirm-delete" onclick="document.getElementById('logoutForm').submit()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
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

    <script>
        const CSRF = document.querySelector('meta[name="csrf-token"]').content;
        const BASE = '{{ url('/admin/api') }}';

        const headers = () => ({
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': CSRF,
            'Accept': 'application/json',
        });

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

        document.addEventListener('DOMContentLoaded', function() {
            const notifModal = document.getElementById('notificationModal');
            if (notifModal) {
                notifModal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeNotification();
                    }
                });
            }
        });

        // Modal helpers
        function openModal(id) {
            document.getElementById(id).classList.add('active');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
            clearErrors();
        }

        document.querySelectorAll('.modal').forEach(m => {
            m.addEventListener('click', e => {
                if (e.target === m) closeModal(m.id);
            });
        });

        // Sidebar toggle
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }

        // Error helpers
        function clearErrors() {
            document.querySelectorAll('.error-text').forEach(el => el.textContent = '');
            document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));
        }

        function showErr(inputId, errId, msg) {
            const input = document.getElementById(inputId);
            if (input) input.classList.add('input-error');
            const errorEl = document.getElementById(errId);
            if (errorEl) errorEl.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${msg}`;
        }

        function showValidationErrors(errors, map) {
            Object.keys(errors).forEach(key => {
                const target = map[key];
                if (target) showErr(target[0], target[1], errors[key][0]);
            });
        }

        // Load & Render Users
        async function loadUsers(search = '') {
            try {
                const res = await fetch(BASE + '/users?search=' + encodeURIComponent(search), {
                    headers: headers()
                });
                const json = await res.json();
                const users = json.data || [];

                document.getElementById('totalUsers').textContent = users.length;
                document.getElementById('filteredCount').textContent = users.length;

                renderUsers(users);
            } catch (e) {
                renderUsers([]);
            }
        }

        function renderUsers(users) {
            const tbody = document.getElementById('userTableBody');
            if (!users.length) {
                tbody.innerHTML =
                    '<tr class="empty-row"><td colspan="4"><i class="fas fa-users"></i><div>Belum ada data user</div></td></tr>';
                return;
            }

            tbody.innerHTML = users.map(u => {
                // Tentukan tampilan avatar
                let avatarHtml = '';
                if (u.profile_photo_url) {
                    avatarHtml =
                        `<img src="${u.profile_photo_url}" alt="${escapeHtml(u.name)}" style="width:100%; height:100%; object-fit:cover; border-radius:12px;">`;
                } else {
                    avatarHtml = u.name ? u.name.charAt(0).toUpperCase() : '?';
                }

                return `
            <tr>
                <td>
                    <div class="user-info">
                        <div class="user-avatar">
                            ${avatarHtml}
                        </div>
                        <div class="user-details">
                            <span class="user-name">${escapeHtml(u.name)}</span>
                            <span class="user-email"><i class="fas fa-envelope"></i> ${escapeHtml(u.email)}</span>
                        </div>
                    </div>
                </td>
                <td>${escapeHtml(u.email)}</td>
                <td>
                    <span class="username-badge">
                        <i class="fas fa-id-card"></i>
                        ${escapeHtml(u.username) || '-'}
                    </span>
                </td>
                <td>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="openEditModal(${u.id},'${escapeHtml(u.name)}','${escapeHtml(u.email)}','${escapeHtml(u.username)}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        ${u.profile_photo_url ? `<button class="btn-reset" onclick="openDeletePhotoModal(${u.id},'${escapeHtml(u.name)}','${u.profile_photo_url}')" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                                                <i class="fas fa-image"></i> Hapus Foto
                                            </button>` : ''}
                        <button class="btn-reset" onclick="openResetModal(${u.id},'${escapeHtml(u.name)}')">
                            <i class="fas fa-key"></i> Reset
                        </button>
                        <button class="btn-delete" onclick="openDeleteModalUser(${u.id},'${escapeHtml(u.name)}')" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;
            }).join('');
        }

        function escapeHtml(s) {
            if (!s) return '';
            return String(s)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;')
                .replace(/`/g, '&#96;');
    }

    // Search with debounce
    let searchTimer;
    document.getElementById('searchInput').addEventListener('input', function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => loadUsers(this.value), 350);
    });

    // ADD USER
    function openAddModal() {
        ['addName', 'addEmail', 'addUsername', 'addPassword'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });
        clearErrors();
        openModal('addModal');
    }

    async function submitAdd() {
        clearErrors();
        const btn = document.getElementById('addSaveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';

        const body = {
            name: document.getElementById('addName').value,
            email: document.getElementById('addEmail').value,
            username: document.getElementById('addUsername').value,
            password: document.getElementById('addPassword').value,
        };

        try {
            const res = await fetch(BASE + '/users', {
                method: 'POST',
                headers: headers(),
                body: JSON.stringify(body)
            });

            const json = await res.json();

            if (res.ok && json.success) {
                closeModal('addModal');
                loadUsers();
                showNotification('Berhasil!', 'User baru berhasil ditambahkan!', 'success');
            } else if (json.errors) {
                showValidationErrors(json.errors, {
                    name: ['addName', 'addNameErr'],
                    email: ['addEmail', 'addEmailErr'],
                    username: ['addUsername', 'addUsernameErr'],
                    password: ['addPassword', 'addPasswordErr'],
                });
            } else {
                showNotification('Error', json.message || 'Gagal menambahkan user.', 'error');
            }
        } catch (e) {
            showNotification('Error', 'Kesalahan jaringan. Coba lagi.', 'error');
        }

        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-save"></i> Simpan';
    }

    // EDIT USER
    function openEditModal(id, name, email, username) {
        document.getElementById('editId').value = id;
        document.getElementById('editName').value = name;
        document.getElementById('editEmail').value = email;
        document.getElementById('editUsername').value = username;
        clearErrors();
        openModal('editModal');
    }

    async function submitEdit() {
        clearErrors();
        const btn = document.getElementById('editSaveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';

        const id = document.getElementById('editId').value;
        const body = {
            email: document.getElementById('editEmail').value,
            username: document.getElementById('editUsername').value,
        };

        try {
            const res = await fetch(BASE + '/users/' + id, {
                method: 'PUT',
                headers: headers(),
                body: JSON.stringify(body)
            });

            const json = await res.json();

            if (res.ok && json.success) {
                closeModal('editModal');
                loadUsers();
                showNotification('Berhasil!', 'Data user berhasil diupdate!', 'success');
            } else if (json.errors) {
                showValidationErrors(json.errors, {
                    email: ['editEmail', 'editEmailErr'],
                    username: ['editUsername', 'editUsernameErr'],
                });
            } else {
                showNotification('Error', json.message || 'Gagal mengupdate user.', 'error');
            }
        } catch (e) {
            showNotification('Error', 'Kesalahan jaringan. Coba lagi.', 'error');
        }

        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-save"></i> Simpan';
    }

    // RESET PASSWORD
    function openResetModal(id, name) {
        document.getElementById('resetId').value = id;
        document.getElementById('resetText').innerHTML =
            `<i class="fas fa-exclamation-triangle" style="color: var(--warning);"></i> Reset password untuk user <strong>${escapeHtml(name)}</strong>`;
        document.getElementById('resetPass').value = '';
        document.getElementById('resetPassConfirm').value = '';
        clearErrors();
        openModal('resetModal');
    }

    async function submitReset() {
        clearErrors();

        const pass = document.getElementById('resetPass').value;
        const passConfirm = document.getElementById('resetPassConfirm').value;

        if (!pass) {
            showErr('resetPass', 'resetPassErr', 'Password baru wajib diisi.');
            return;
        }
        if (pass.length < 8) {
            showErr('resetPass', 'resetPassErr', 'Minimal 8 karakter.');
            return;
        }
        if (!passConfirm) {
            showErr('resetPassConfirm', 'resetPassConfirmErr', 'Konfirmasi password wajib diisi.');
            return;
        }
        if (pass !== passConfirm) {
            showErr('resetPassConfirm', 'resetPassConfirmErr', 'Password tidak cocok.');
            return;
        }

        const btn = document.getElementById('resetSaveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mereset...';

        const id = document.getElementById('resetId').value;
        const body = {
            password: pass,
            password_confirmation: passConfirm
        };

        try {
            const res = await fetch(BASE + '/users/' + id + '/reset-password', {
                method: 'POST',
                headers: headers(),
                body: JSON.stringify(body)
            });

            const json = await res.json();

            if (res.ok && json.success) {
                closeModal('resetModal');
                showNotification('Berhasil!', 'Password berhasil direset!', 'success');
            } else if (json.errors) {
                showValidationErrors(json.errors, {
                    password: ['resetPass', 'resetPassErr'],
                    password_confirmation: ['resetPassConfirm', 'resetPassConfirmErr'],
                });
            } else {
                showNotification('Error', json.message || 'Gagal mereset password.', 'error');
            }
        } catch (e) {
            showNotification('Error', 'Kesalahan jaringan. Coba lagi.', 'error');
        }

        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-key"></i> Reset';
    }

    // DELETE USER
    function openDeleteModalUser(id, name) {
        document.getElementById('deleteId').value = id;
        document.getElementById('deleteText').innerHTML =
            `<i class="fas fa-exclamation-triangle" style="color: var(--danger);"></i> Apakah Anda yakin ingin menghapus user <strong>${escapeHtml(name)}</strong>?`;
        openModal('deleteModal');
    }

    async function submitDelete() {
        const id = document.getElementById('deleteId').value;

        try {
            const res = await fetch(BASE + '/users/' + id, {
                method: 'DELETE',
                headers: headers()
            });

            const json = await res.json();

            if (res.ok && json.success) {
                closeModal('deleteModal');
                loadUsers();
                showNotification('Berhasil!', 'User berhasil dihapus!', 'success');
            } else {
                showNotification('Error', json.message || 'Gagal menghapus user.', 'error');
            }
        } catch (e) {
            showNotification('Error', 'Kesalahan jaringan. Coba lagi.', 'error');
        }
    }

    // DELETE USER PHOTO
    function openDeletePhotoModal(id, name, photoUrl) {
        document.getElementById('deletePhotoUserId').value = id;
        document.getElementById('deletePhotoText').innerHTML =
            `<i class="fas fa-exclamation-triangle" style="color: var(--danger);"></i> Apakah Anda yakin ingin menghapus foto profil user <strong>${escapeHtml(name)}</strong>?`;

        // Tampilkan preview foto
        const previewDiv = document.getElementById('photoPreviewDelete');
        previewDiv.innerHTML = `
                    <img src="${photoUrl}" alt="Foto Profil">
                    <div style="margin-top: 0.5rem; font-size: 0.85rem; color: var(--gray-500);">
                        <i class="fas fa-image"></i> Foto profil saat ini
                    </div>
                `;

            openModal('deletePhotoModal');
        }

        async function submitDeletePhoto() {
            const id = document.getElementById('deletePhotoUserId').value;
            const btn = document.querySelector('#deletePhotoModal .btn-confirm-delete');

            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';

            try {
                const res = await fetch(BASE + '/users/' + id + '/delete-photo', {
                    method: 'DELETE',
                    headers: headers()
                });

                const json = await res.json();

                if (res.ok && json.success) {
                    closeModal('deletePhotoModal');
                    loadUsers(); // Refresh daftar user
                    showNotification('Berhasil!', 'Foto profil user berhasil dihapus!', 'success');
                } else {
                    showNotification('Error', json.message || 'Gagal menghapus foto profil.', 'error');
                }
            } catch (e) {
                showNotification('Error', 'Kesalahan jaringan. Coba lagi.', 'error');
            }

            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-trash-alt"></i> Ya, Hapus Foto';
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('.modal.active');
                modals.forEach(modal => {
                    modal.classList.remove('active');
                });
            }
        });

        // Init
        loadUsers();
    </script>
</body>

</html>
