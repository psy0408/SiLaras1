<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Riwayat Admin - SiLaras</title>
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

        /* Filter Section */
        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
            border: 1px solid rgba(79, 70, 229, 0.1);
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

        /* Reports Section */
        .reports-section {
            background: white;
            border-radius: 24px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            margin-bottom: 1.5rem;
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

        .section-badge {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .section-badge.success {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
        }

        .section-badge.danger {
            background: linear-gradient(135deg, var(--danger) 0%, #dc2626 100%);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 16px;
        }

        .reports-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .reports-table thead {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
        }

        .reports-table th {
            padding: 1rem 1rem;
            text-align: left;
            font-weight: 700;
            color: var(--primary);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }

        .reports-table th:first-child {
            border-radius: 16px 0 0 0;
        }

        .reports-table th:last-child {
            border-radius: 0 16px 0 0;
        }

        .reports-table td {
            padding: 1rem 1rem;
            border-bottom: 1px solid var(--gray-200);
            color: var(--gray-600);
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .reports-table tbody tr {
            transition: all 0.2s;
            cursor: default;
        }

        .reports-table tbody tr:hover {
            background: var(--gray-50);
        }

        .reports-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* User Info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--gray-500);
        }

        /* Report ID */
        .report-id {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            color: var(--secondary);
            font-size: 0.9rem;
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            padding: 0.3rem 0.8rem;
            border-radius: 30px;
            display: inline-block;
        }

        /* Status Badge */
        .status-badge {
            padding: 0.35rem 1rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            white-space: nowrap;
        }

        .status-selesai {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #86efac;
        }

        .status-ditolak {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        /* Category Badge */
        .category-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.2rem 0.7rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-left: 0.5rem;
        }

        .category-sarana {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #86efac;
        }

        .category-prasarana {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.4rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-detail {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            box-shadow: var(--shadow-colored);
        }

        .btn-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .btn-icon {
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

        .btn-icon:hover {
            transform: scale(1.1);
        }

        .btn-icon.print:hover {
            background: var(--secondary);
            color: white;
        }

        .btn-icon.delete:hover {
            background: var(--danger);
            color: white;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: var(--gray-300);
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: var(--gray-500);
            font-size: 1rem;
            font-weight: 500;
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
            max-width: 600px;
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

        .detail-item {
            display: flex;
            padding: 0.8rem 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 700;
            color: var(--gray-600);
            width: 150px;
            flex-shrink: 0;
            font-size: 0.85rem;
        }

        .detail-value {
            color: var(--gray-800);
            flex: 1;
            font-size: 0.9rem;
            font-weight: 500;
        }

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

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: 100%;
            }

            .reports-table th,
            .reports-table td {
                padding: 0.8rem;
                font-size: 0.8rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-detail {
                width: 100%;
                justify-content: center;
            }

            .btn-icon {
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

            .detail-item {
                flex-direction: column;
                gap: 0.3rem;
            }

            .detail-label {
                width: 100%;
            }

            .modal-buttons {
                flex-direction: column;
            }

            .btn-cancel,
            .btn-confirm-delete {
                width: 100%;
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
            <a href="/admin/riwayat-ad" class="menu-item active">
                <i class="fas fa-history"></i>
                <span>Riwayat</span>
            </a>
            <a href="/admin/user-ad" class="menu-item">
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
                <h1>Riwayat Laporan</h1>
                <div class="header-badge">
                    <i class="fas fa-history"></i>
                    <span>Total Selesai: {{ $selesaiReports->count() }} | Ditolak: {{ $ditolakReports->count() }}</span>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari berdasarkan nama atau ID laporan..." id="searchInput">
            </div>
            <div class="filter-info">
                <i class="fas fa-info-circle"></i>
                <span>Ketik untuk mencari laporan</span>
            </div>
        </div>

        <!-- Laporan Selesai -->
        <div class="reports-section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fas fa-check-circle"></i>
                    <span>Laporan Selesai</span>
                </div>
                <span class="section-badge success">{{ $selesaiReports->count() }} Laporan</span>
            </div>

            @if ($selesaiReports->count() > 0)
                <div class="table-container">
                    <table class="reports-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>ID Laporan</th>
                                <th>Sarana</th>
                                <th>Tanggal Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="searchable">
                            @foreach ($selesaiReports as $report)
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                {{ substr($report->user->name, 0, 1) }}
                                            </div>
                                            <div class="user-details">
                                                <span class="user-name">{{ $report->user->name }}</span>
                                                <span class="user-role">{{ $report->user->username ?? 'Siswa' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="report-id">
                                            #{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-direction: column; gap: 0.3rem;">
                                            <div style="font-weight: 600; color: var(--gray-800);">
                                                <i
                                                    class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                                                {{ $report->jenis_sarana }}
                                            </div>
                                            <div>
                                                <span class="status-badge status-selesai">
                                                    <i class="fas fa-check-circle"></i>
                                                    Selesai
                                                </span>
                                                <span class="category-badge category-{{ $report->kategori }}">
                                                    <i
                                                        class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                                                    {{ ucfirst($report->kategori) }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <i class="far fa-calendar-alt"
                                            style="color: var(--secondary); margin-right: 0.3rem;"></i>
                                        {{ $report->updated_at->format('d M Y') }}
                                    </td>
                                    <td class="action-buttons">
                                        <button class="btn-detail" onclick="viewDetail({{ $report->id }})">
                                            <i class="fas fa-eye"></i> Detail
                                        </button>
                                        <button class="btn-icon print" onclick="printReport({{ $report->id }})"
                                            title="Cetak PDF">
                                            <i class="fas fa-print"></i>
                                        </button>
                                        <button class="btn-icon delete"
                                            onclick="openDeleteModal({{ $report->id }}, '{{ $report->user->name }}')"
                                            title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-check-circle" style="color: var(--gray-400);"></i>
                    </div>
                    <p>Belum ada laporan yang selesai</p>
                </div>
            @endif
        </div>

        <!-- Laporan Ditolak -->
        <div class="reports-section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fas fa-times-circle"></i>
                    <span>Laporan Ditolak</span>
                </div>
                <span class="section-badge danger">{{ $ditolakReports->count() }} Laporan</span>
            </div>

            @if ($ditolakReports->count() > 0)
                <div class="table-container">
                    <table class="reports-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>ID Laporan</th>
                                <th>Sarana</th>
                                <th>Tanggal Ditolak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="searchable">
                            @foreach ($ditolakReports as $report)
                                <tr>
                                    <td>
                                        <div class="user-info">
                                            <div class="user-avatar">
                                                {{ substr($report->user->name, 0, 1) }}
                                            </div>
                                            <div class="user-details">
                                                <span class="user-name">{{ $report->user->name }}</span>
                                                <span class="user-role">{{ $report->user->username ?? 'Siswa' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="report-id">
                                            #{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div style="display: flex; flex-direction: column; gap: 0.3rem;">
                                            <div style="font-weight: 600; color: var(--gray-800);">
                                                <i
                                                    class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                                                {{ $report->jenis_sarana }}
                                            </div>
                                            <div>
                                                <span class="status-badge status-ditolak">
                                                    <i class="fas fa-times-circle"></i>
                                                    Ditolak
                                                </span>
                                                <span class="category-badge category-{{ $report->kategori }}">
                                                    <i
                                                        class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                                                    {{ ucfirst($report->kategori) }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <i class="far fa-calendar-alt"
                                            style="color: var(--secondary); margin-right: 0.3rem;"></i>
                                        {{ $report->updated_at->format('d M Y') }}
                                    </td>
                                    <td class="action-buttons">
                                        <button class="btn-detail" onclick="viewDetail({{ $report->id }})">
                                            <i class="fas fa-eye"></i> Detail
                                        </button>
                                        <button class="btn-icon delete"
                                            onclick="openDeleteModal({{ $report->id }}, '{{ $report->user->name }}')"
                                            title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-times-circle" style="color: var(--gray-400);"></i>
                    </div>
                    <p>Belum ada laporan yang ditolak</p>
                </div>
            @endif
        </div>
    </main>

    <!-- Detail Modal -->
    <div class="modal" id="detailModal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-file-alt"></i>
                <h3>Detail Laporan</h3>
            </div>
            <div id="detailContent"></div>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('detailModal')">
                    <i class="fas fa-times"></i>
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-trash-alt" style="color: var(--danger);"></i>
                <h3 style="color: var(--danger);">Konfirmasi Hapus</h3>
            </div>
            <p id="deleteText" style="margin-bottom: 2rem;"></p>
            <input type="hidden" id="deleteId">
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('deleteModal')">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button class="btn-confirm-delete" onclick="submitDelete()">
                    <i class="fas fa-trash-alt"></i>
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal" id="logoutModal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">
                <i class="fas fa-sign-out-alt" style="color: var(--danger);"></i>
                <h3 style="color: var(--danger);">Konfirmasi Logout</h3>
            </div>
            <p style="margin-bottom: 2rem;">Apakah Anda yakin ingin keluar dari dashboard?</p>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('logoutModal')">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button class="btn-confirm-delete" onclick="document.getElementById('logoutForm').submit()">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
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

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tables = document.querySelectorAll('.searchable');

            tables.forEach(tbody => {
                const rows = tbody.querySelectorAll('tr');
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchValue) ? '' : 'none';
                });
            });
        });

        // View detail
        async function viewDetail(id) {
            try {
                const res = await fetch(BASE + '/reports/' + id, {
                    headers: headers()
                });
                const json = await res.json();
                const r = json.data;

                const kategoriLabel = r.kategori === 'sarana' ?
                    '<i class="fas fa-chair"></i> Sarana' :
                    '<i class="fas fa-school"></i> Prasarana';

                let detailHTML = `
                    <div class="detail-item"><div class="detail-label">Kategori</div><div class="detail-value">${kategoriLabel}</div></div>
                    <div class="detail-item"><div class="detail-label">Nama Pelapor</div><div class="detail-value">${escapeHtml(r.nama_pelapor)}</div></div>
                    <div class="detail-item"><div class="detail-label">Username</div><div class="detail-value">${escapeHtml(r.username)}</div></div>
                    <div class="detail-item"><div class="detail-label">Kelas</div><div class="detail-value">${escapeHtml(r.kelas)}</div></div>
                    <div class="detail-item"><div class="detail-label">Jurusan</div><div class="detail-value">${escapeHtml(r.jurusan)}</div></div>
                    <div class="detail-item"><div class="detail-label">Jenis ${r.kategori === 'sarana' ? 'Sarana' : 'Prasarana'}</div><div class="detail-value">${escapeHtml(r.jenis_sarana)}</div></div>
                    <div class="detail-item"><div class="detail-label">Tingkat Kerusakan</div><div class="detail-value">${escapeHtml(r.tingkat_kerusakan)}</div></div>
                    <div class="detail-item"><div class="detail-label">Lokasi</div><div class="detail-value"><i class="fas fa-map-marker-alt"></i> ${escapeHtml(r.lokasi)}</div></div>
                    <div class="detail-item"><div class="detail-label">Deskripsi</div><div class="detail-value">${escapeHtml(r.deskripsi)}</div></div>
                    <div class="detail-item"><div class="detail-label">Tanggal Laporan</div><div class="detail-value"><i class="far fa-calendar-alt"></i> ${formatDate(r.tanggal_laporan)}</div></div>
                    <div class="detail-item"><div class="detail-label">Status</div><div class="detail-value"><span class="status-badge status-${r.status.toLowerCase()}">${r.status}</span></div></div>
                `;

                if (r.admin_feedback) {
                    detailHTML += `
                        <div class="detail-item">
                            <div class="detail-label">Feedback Admin</div>
                            <div class="detail-value" style="background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%); padding: 1rem; border-radius: 12px; border-left: 4px solid var(--secondary);">
                                <i class="fas fa-quote-left" style="color: var(--secondary); opacity: 0.5;"></i>
                                ${escapeHtml(r.admin_feedback)}
                            </div>
                        </div>
                    `;
                }

                if (r.foto_bukti) {
                    detailHTML += `
                        <div class="detail-item">
                            <div class="detail-label">Foto Bukti</div>
                            <div class="detail-value">
                                <img src="/storage/${r.foto_bukti}" 
                                     alt="Foto Bukti" 
                                     style="max-width: 100%; border-radius: 12px; margin-top: 0.5rem; box-shadow: var(--shadow);">
                            </div>
                        </div>
                    `;
                }

                document.getElementById('detailContent').innerHTML = detailHTML;
                openModal('detailModal');
            } catch (e) {
                console.error('Error:', e);
                showNotification('Error', 'Gagal memuat detail laporan.', 'error');
            }
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

    function formatDate(dateStr) {
        if (!dateStr) return '-';
        try {
            const date = new Date(dateStr);
            return date.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });
        } catch {
            return dateStr;
        }
    }

    // Print PDF
    function printReport(reportId) {
        window.open(`/admin/riwayat-ad/print/${reportId}`, '_blank');
    }

    // Delete
    function openDeleteModal(id, nama) {
        document.getElementById('deleteId').value = id;
        document.getElementById('deleteText').innerHTML =
            `<i class="fas fa-exclamation-triangle" style="color: var(--danger);"></i> Apakah Anda yakin ingin menghapus laporan dari <strong>${escapeHtml(nama)}</strong>?`;
        openModal('deleteModal');
    }

    async function submitDelete() {
        const id = document.getElementById('deleteId').value;

        try {
            const res = await fetch(`${BASE}/riwayat/${id}`, {
                    method: 'DELETE',
                    headers: headers()
                });
                const json = await res.json();

                if (res.ok && json.success) {
                    closeModal('deleteModal');
                    showNotification('Berhasil!', 'Laporan berhasil dihapus dari riwayat!', 'success');
                    setTimeout(() => location.reload(), 1500);
                }
            } catch (e) {
                console.error('Error:', e);
                showNotification('Error', 'Gagal menghapus laporan.', 'error');
            }
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
    </script>
</body>

</html>
