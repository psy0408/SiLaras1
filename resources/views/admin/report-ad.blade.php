<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Report Admin - SiLaras</title>
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

        /* Sidebar - Modern dengan ikon */
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
            flex: 2;
            min-width: 280px;
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

        .filter-box {
            flex: 1;
            min-width: 200px;
            position: relative;
        }

        .filter-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 0.9rem;
            z-index: 1;
        }

        .filter-box select {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 2.8rem;
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: var(--gray-700);
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 0.9rem;
        }

        .filter-box select:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .reset-btn {
            background: var(--gray-100);
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1.1rem;
        }

        .reset-btn:hover {
            background: var(--gray-200);
            color: var(--secondary);
            transform: rotate(90deg);
        }

        /* Reports Section */
        .reports-section {
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
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title i {
            color: var(--secondary);
            font-size: 1.3rem;
        }

        .total-badge {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 16px;
            margin-bottom: 1.5rem;
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
            position: relative;
        }

        .reports-table tbody tr:hover {
            background: var(--gray-50);
        }

        .reports-table tbody tr:last-child td {
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

        .user-username {
            font-size: 0.75rem;
            color: var(--gray-500);
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

        .status-pending {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .status-diproses {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #93c5fd;
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

        .custom-select {
            position: relative;
            width: 100%;
            cursor: pointer;
            font-size: 14px;
        }

        .select-selected {
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }

        .select-selected:hover {
            border-color: var(--primary);
        }

        .select-options {
            position: absolute;
            top: 110%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: none;
            z-index: 999;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .select-options div {
            padding: 10px 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }

        .select-options div:hover {
            background: #f5f5f5;
        }

        .select-options div i {
            width: 16px;
        }

        /* warna per status */
        .select-options div[data-value="Pending"] i {
            color: orange;
        }

        .select-options div[data-value="Diproses"] i {
            color: blue;
        }

        .select-options div[data-value="Selesai"] i {
            color: green;
        }

        .select-options div[data-value="Ditolak"] i {
            color: red;
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

        /* Priority Badge */
        .priority-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.2rem;
            padding: 0.2rem 0.7rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .priority-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .priority-high {
            background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%);
            color: #9a3412;
            border: 1px solid #fb923c;
        }

        .priority-medium {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .priority-low {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        /* Row highlight based on priority */
        .priority-danger-row {
            background: linear-gradient(90deg, #fef2f2 0%, white 95%);
            border-left: 4px solid #dc2626;
        }

        .priority-high-row {
            background: linear-gradient(90deg, #fff7ed 0%, white 95%);
            border-left: 4px solid #ea580c;
        }

        .priority-medium-row {
            background: linear-gradient(90deg, #fefce8 0%, white 95%);
            border-left: 4px solid #f59e0b;
        }

        .priority-low-row {
            background: linear-gradient(90deg, #eff6ff 0%, white 95%);
            border-left: 4px solid #3b82f6;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.4rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-detail,
        .btn-edit {
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

        .btn-detail {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            box-shadow: var(--shadow-colored);
        }

        .btn-edit {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
        }

        .btn-detail:hover,
        .btn-edit:hover {
            transform: translateY(-2px);
        }

        .btn-detail:hover {
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }

        .btn-edit:hover {
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
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
            background: var(--danger);
            color: white;
            transform: scale(1.1);
        }

        /* Feedback Tooltip */
        .feedback-tooltip {
            position: relative;
            display: inline-block;
            cursor: help;
        }

        .has-feedback {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            padding: 0.2rem 0.7rem;
            border-radius: 6px;
            font-size: 0.7rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            border: 1px solid #93c5fd;
            transition: all 0.3s;
        }

        .has-feedback i {
            font-size: 0.7rem;
        }

        .has-feedback:hover {
            background: linear-gradient(135deg, #93c5fd 0%, #60a5fa 100%);
            color: white;
            transform: scale(1.05);
        }

        .tooltip-content {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            bottom: 140%;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 1rem 1.2rem;
            border-radius: 16px;
            font-size: 0.85rem;
            white-space: normal;
            width: 280px;
            z-index: 10001;
            box-shadow: var(--shadow-xl);
            transition: all 0.3s ease;
            line-height: 1.6;
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .tooltip-content::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 10px solid transparent;
            border-top-color: var(--secondary);
        }

        .feedback-tooltip:hover .tooltip-content {
            visibility: visible;
            opacity: 1;
            bottom: 150%;
        }

        .tooltip-label {
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 0.3rem;
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

        .btn-confirm {
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

        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
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

        /* Form Group */
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

        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: all 0.3s;
        }

        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
            line-height: 1.6;
        }

        .form-group small {
            color: var(--gray-500);
            display: block;
            margin-top: 0.5rem;
            font-size: 0.8rem;
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

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 2px solid var(--gray-100);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .pagination-info {
            color: var(--gray-500);
            font-size: 0.9rem;
        }

        .pagination-info strong {
            color: var(--primary);
            font-weight: 700;
        }

        .pagination-buttons {
            display: flex;
            gap: 0.4rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .pagination-btn {
            padding: 0.5rem 1rem;
            border: 2px solid var(--gray-200);
            background: white;
            color: var(--gray-600);
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            min-width: 38px;
            text-align: center;
        }

        .pagination-btn:hover:not(:disabled) {
            border-color: var(--secondary);
            color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-color: transparent;
            box-shadow: var(--shadow-colored);
        }

        .pagination-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        .pagination-btn.prev-next {
            padding: 0.5rem 1.2rem;
        }

        .pagination-ellipsis {
            padding: 0.5rem 0.3rem;
            color: var(--gray-400);
            font-weight: 700;
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

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box,
            .filter-box {
                width: 100%;
            }

            .reset-btn {
                align-self: flex-end;
            }

            .header-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.8rem;
            }

            .pagination-container {
                flex-direction: column;
                text-align: center;
            }

            .pagination-buttons {
                justify-content: center;
            }

            .action-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-detail,
            .btn-edit {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 640px) {
            .header h1 {
                font-size: 1.5rem;
            }

            .reports-table th,
            .reports-table td {
                padding: 0.8rem;
                font-size: 0.8rem;
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
            .btn-confirm,
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
            <a href="/admin/report-ad" class="menu-item active">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>
            <a href="/admin/riwayat-ad" class="menu-item">
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
                <h1>Pengelola Laporan</h1>
                <div class="header-badge">
                    <i class="fas fa-file-alt"></i>
                    <span>Total Laporan: <span id="totalReportsCount">0</span></span>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari berdasarkan nama, Username, atau lokasi..." id="searchInput">
            </div>
            <div class="filter-box">
                <i class="fas fa-filter"></i>
                <select id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="pending">⏳ Pending</option>
                    <option value="diproses">🔄 Diproses</option>
                </select>
            </div>
            <div class="filter-box">
                <i class="fas fa-layer-group"></i>
                <select id="filterKategori">
                    <option value="">Semua Kategori</option>
                    <option value="sarana">🪑 Sarana</option>
                    <option value="prasarana">🏫 Prasarana</option>
                </select>
            </div>
            <button class="reset-btn" onclick="resetFilters()" title="Reset Filter">
                <i class="fas fa-undo-alt"></i>
            </button>
        </div>

        <!-- Reports Section -->
        <div class="reports-section">
            <div class="section-header">
                <div class="section-title">
                    <i class="fas fa-list-ul"></i>
                    <span>Daftar Laporan Masuk</span>
                </div>
                <span class="total-badge" id="filteredCount">0</span>
            </div>

            <div class="table-container">
                <table class="reports-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Sarana</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="reportsTableBody">
                        <tr class="empty-row">
                            <td colspan="6">
                                <i class="fas fa-inbox"></i>
                                <div>Memuat data...</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-container" id="paginationContainer" style="display: none;">
                <div class="pagination-info">
                    <i class="fas fa-file-alt"></i>
                    Menampilkan <strong id="showingStart">1</strong> - <strong id="showingEnd">15</strong> dari <strong
                        id="totalReports">0</strong> laporan
                </div>
                <div class="pagination-buttons" id="paginationButtons"></div>
            </div>
        </div>
    </main>

    <!-- Detail Report Modal -->
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

    <!-- Edit Status & Feedback Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-edit"></i>
                <h3>Edit Status & Feedback</h3>
            </div>
            <input type="hidden" id="editId">
            <div class="form-group">
                <label><i class="fas fa-tag"></i> Status</label>
                <div class="custom-select" id="statusSelect">
                    <div class="select-selected">
                        <i class="fas fa-hourglass-half"></i> Pending
                    </div>

                    <div class="select-options">
                        <div data-value="Pending">
                            <i class="fas fa-hourglass-half"></i> Pending
                        </div>
                        <div data-value="Diproses">
                            <i class="fas fa-sync-alt"></i> Diproses
                        </div>
                        <div data-value="Selesai">
                            <i class="fas fa-check-circle"></i> Selesai
                        </div>
                        <div data-value="Ditolak">
                            <i class="fas fa-times-circle"></i> Ditolak
                        </div>
                    </div>

                    <!-- hidden input untuk dikirim ke backend -->
                    <input type="hidden" id="editStatus" value="Pending">
                </div>
            </div>
            <div class="form-group">
                <label><i class="fas fa-comment"></i> Feedback <span style="color: var(--danger);">*</span></label>
                <textarea id="adminFeedback" rows="4" placeholder="Berikan pesan atau catatan untuk user..."></textarea>
                <small>
                    <i class="fas fa-info-circle"></i>
                    Wajib diisi untuk status "Selesai" atau "Ditolak"
                </small>
            </div>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('editModal')">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
                <button class="btn-confirm" onclick="submitEditStatus()">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </div>
        </div>
    </div>

    <!-- Konfirmasi Hapus Modal -->
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

    <!-- Batch Update Modal -->
    <div class="modal" id="batchUpdateModal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-layer-group" style="color: var(--warning);"></i>
                <h3>Laporan Serupa Ditemukan</h3>
            </div>
            <div
                style="background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%); padding: 1.2rem; border-radius: 16px; margin-bottom: 1.5rem; border-left: 4px solid var(--secondary);">
                <p style="color: var(--gray-600); font-size: 0.9rem; margin-bottom: 0.8rem;">
                    <i class="fas fa-info-circle"></i> Ditemukan <strong id="similarCount"
                        style="color: var(--primary);">0</strong> laporan lain dengan:
                </p>
                <ul id="similarCriteria"
                    style="color: var(--gray-600); margin-left: 1.5rem; line-height: 1.8; font-size: 0.9rem;"></ul>
            </div>
            <p style="color: var(--gray-700); font-weight: 600; margin-bottom: 1.5rem;">
                Apakah Anda ingin memproses semua laporan sekaligus?
            </p>
            <input type="hidden" id="batchReportIds">
            <div class="modal-buttons" style="gap: 0.8rem;">
                <button class="btn-cancel" onclick="closeModal('batchUpdateModal')" style="flex: 1;">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button class="btn-detail" onclick="updateSingleReport()"
                    style="flex: 1; background: linear-gradient(135deg, #94a3b8 0%, #64748b 100%);">
                    <i class="fas fa-file"></i> 1 Laporan
                </button>
                <button class="btn-confirm" onclick="updateBatchReports()" style="flex: 1;">
                    <i class="fas fa-layer-group"></i> Semua (<span id="batchCount">0</span>)
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

        // Pagination state
        let currentPage = 1;
        let itemsPerPage = 15;
        let allReports = [];
        let filteredReports = [];

        // Batch update state
        let currentEditData = null;
        let similarReports = [];

        const select = document.getElementById('statusSelect');
        const selected = select.querySelector('.select-selected');
        const options = select.querySelector('.select-options');
        const hiddenInput = document.getElementById('editStatus');

        // buka/tutup dropdown
        selected.addEventListener('click', () => {
            options.style.display = options.style.display === 'block' ? 'none' : 'block';
        });

        // pilih option
        options.querySelectorAll('div').forEach(opt => {
            opt.addEventListener('click', () => {
                selected.innerHTML = opt.innerHTML;
                hiddenInput.value = opt.dataset.value;
                options.style.display = 'none';
            });
        });

        // klik luar = tutup
        document.addEventListener('click', (e) => {
                    if (!select.contains(e.target)) {
                        options.style.display = 'none';
                    }
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

                    // Reset filters
                    function resetFilters() {
                        document.getElementById('searchInput').value = '';
                        document.getElementById('filterStatus').value = '';
                        document.getElementById('filterKategori').value = '';
                        loadReports();
                    }

                    // Load reports
                    async function loadReports() {
                        const search = document.getElementById('searchInput').value;
                        const status = document.getElementById('filterStatus').value;
                        const kategori = document.getElementById('filterKategori').value;

                        try {
                            // Build URL with all parameters
                            let url = BASE + '/reports?';
                            const params = [];

                            if (search) params.push('search=' + encodeURIComponent(search));
                            if (status) params.push('status=' + encodeURIComponent(status));
                            if (kategori) params.push('kategori=' + encodeURIComponent(kategori));

                            url += params.join('&');

                            console.log('Loading reports with URL:', url); // Debug log

                            const res = await fetch(url, {
                                headers: headers()
                            });
                            const json = await res.json();

                            allReports = json.data || [];

                            console.log('Total reports from API:', allReports.length); // Debug log
                            console.log('Filter kategori:', kategori); // Debug log

                            // Apply client-side filtering as backup (in case backend doesn't support it yet)
                            let filtered = [...allReports];

                            // Apply kategori filter on client side if needed
                            if (kategori) {
                                filtered = filtered.filter(r => {
                                    const match = r.kategori && r.kategori.toLowerCase() === kategori
                                        .toLowerCase();
                                    return match;
                                });
                                console.log('After kategori filter:', filtered.length); // Debug log
                            }

                            // Sort by priority
                            filteredReports = filterAndSortReports(filtered);

                            // Update total counts
                            document.getElementById('totalReportsCount').textContent = filteredReports.length;
                            document.getElementById('filteredCount').textContent = filteredReports.length;

                            // Reset to page 1
                            currentPage = 1;

                            // Render current page
                            renderCurrentPage();
                            renderPagination();
                        } catch (e) {
                            console.error('Error loading reports:', e);
                            allReports = [];
                            filteredReports = [];
                            renderCurrentPage();
                            renderPagination();
                        }
                    }

                    function filterAndSortReports(reports) {
                        const priorityOrder = {
                            'Membahayakan': 1,
                            'Berat': 2,
                            'Sedang': 3,
                            'Ringan': 4
                        };

                        return [...reports].sort((a, b) => {
                            const priorityA = priorityOrder[a.tingkat_kerusakan] || 999;
                            const priorityB = priorityOrder[b.tingkat_kerusakan] || 999;
                            return priorityA - priorityB;
                        });
                    }

                    function renderCurrentPage() {
                        const startIndex = (currentPage - 1) * itemsPerPage;
                        const endIndex = startIndex + itemsPerPage;
                        const pageReports = filteredReports.slice(startIndex, endIndex);

                        renderReports(pageReports);
                        updatePaginationInfo(startIndex, endIndex);
                    }

                    function updatePaginationInfo(startIndex, endIndex) {
                        const total = filteredReports.length;

                        if (total > 0) {
                            document.getElementById('showingStart').textContent = startIndex + 1;
                            document.getElementById('showingEnd').textContent = Math.min(endIndex, total);
                            document.getElementById('totalReports').textContent = total;
                        }
                    }

                    function renderReports(reports) {
                        const tbody = document.getElementById('reportsTableBody');

                        if (!reports.length) {
                            tbody.innerHTML =
                                '<tr class="empty-row"><td colspan="6"><i class="fas fa-inbox"></i><div>Belum ada laporan</div></td></tr>';
                            return;
                        }

                        tbody.innerHTML = reports.map(r => {
                            const kategoriIcon = r.kategori === 'sarana' ? 'fa-chair' : 'fa-school';
                            const kategoriBadge = r.kategori === 'sarana' ?
                                '<span class="category-badge category-sarana"><i class="fas fa-chair"></i> Sarana</span>' :
                                '<span class="category-badge category-prasarana"><i class="fas fa-school"></i> Prasarana</span>';

                            let priorityIcon = '';
                            let priorityClass = '';
                            let rowPriorityClass = '';

                            switch (r.tingkat_kerusakan) {
                                case 'Membahayakan':
                                    priorityIcon = 'fa-exclamation-triangle';
                                    priorityClass = 'priority-danger';
                                    rowPriorityClass = 'priority-danger-row';
                                    break;
                                case 'Berat':
                                    priorityIcon = 'fa-exclamation-circle';
                                    priorityClass = 'priority-high';
                                    rowPriorityClass = 'priority-high-row';
                                    break;
                                case 'Sedang':
                                    priorityIcon = 'fa-exclamation';
                                    priorityClass = 'priority-medium';
                                    rowPriorityClass = 'priority-medium-row';
                                    break;
                                case 'Ringan':
                                    priorityIcon = 'fa-tools';
                                    priorityClass = 'priority-low';
                                    rowPriorityClass = 'priority-low-row';
                                    break;
                            }

                            const priorityBadge =
                                `<span class="priority-badge ${priorityClass}"><i class="fas ${priorityIcon}"></i> ${r.tingkat_kerusakan}</span>`;

                            const feedbackTooltip = r.admin_feedback ? `
                    <span class="feedback-tooltip">
                        <span class="has-feedback"><i class="fas fa-comment"></i> Pesan</span>
                        <div class="tooltip-content">
                            <div class="tooltip-label"><i class="fas fa-comment-dots"></i> Feedback Admin</div>
                            <div class="tooltip-message">${escapeHtml(r.admin_feedback)}</div>
                        </div>
                    </span>
                ` : '';

                            let statusIcon = '';
                            switch (r.status.toLowerCase()) {
                                case 'pending':
                                    statusIcon = 'fa-clock';
                                    break;
                                case 'diproses':
                                    statusIcon = 'fa-sync-alt';
                                    break;
                                case 'selesai':
                                    statusIcon = 'fa-check-circle';
                                    break;
                                case 'ditolak':
                                    statusIcon = 'fa-times-circle';
                                    break;
                            }

                            const statusBadge =
                                `<span class="status-badge status-${r.status.toLowerCase()}"><i class="fas ${statusIcon}"></i> ${r.status}</span>`;

                            return `
                <tr class="${rowPriorityClass}">
                    <td>
                        <div class="user-info">
                            <div class="user-avatar">
                                ${r.nama_pelapor ? r.nama_pelapor.charAt(0).toUpperCase() : '?'}
                            </div>
                            <div class="user-details">
                                <span class="user-name">${escapeHtml(r.nama_pelapor)}</span>
                                <span class="user-username">${escapeHtml(r.username)}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; flex-direction: column; gap: 0.3rem;">
                            <div style="font-weight: 600; color: var(--gray-800);">
                                <i class="fas ${kategoriIcon}"></i> ${escapeHtml(r.jenis_sarana)}
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.3rem; flex-wrap: wrap;">
                                ${kategoriBadge}
                                ${priorityBadge}
                                ${feedbackTooltip}
                            </div>
                        </div>
                    </td>
                    <td><i class="fas fa-map-marker-alt" style="color: var(--secondary); margin-right: 0.3rem;"></i>${escapeHtml(r.lokasi)}</td>
                    <td><i class="far fa-calendar-alt" style="color: var(--secondary); margin-right: 0.3rem;"></i>${formatDate(r.tanggal_laporan)}</td>
                    <td>${statusBadge}</td>
                    <td class="action-buttons">
                        <button class="btn-detail" onclick="viewDetail(${r.id})"><i class="fas fa-eye"></i> Detail</button>
                        <button class="btn-edit" onclick="editReport(${r.id}, '${r.status}', \`${escapeHtml(r.admin_feedback || '')}\`)"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn-icon" onclick="openDeleteModal(${r.id}, '${escapeHtml(r.nama_pelapor)}')"><i class="fas fa-trash"></i></button>
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

                // Pagination rendering
                function renderPagination() {
                    const totalPages = Math.ceil(filteredReports.length / itemsPerPage);
                    const container = document.getElementById('paginationContainer');
                    const buttonsContainer = document.getElementById('paginationButtons');

                    if (totalPages <= 1) {
                        container.style.display = 'none';
                        return;
                    }

                    container.style.display = 'flex';

                    let buttonsHTML = '';

                    buttonsHTML += `
                            <button class="pagination-btn prev-next" 
                                    onclick="goToPage(${currentPage - 1})" 
                                    ${currentPage === 1 ? 'disabled' : ''}>
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        `;

                    const pagesToShow = getPageNumbers(currentPage, totalPages);

                    pagesToShow.forEach(page => {
                        if (page === '...') {
                            buttonsHTML += '<span class="pagination-ellipsis">...</span>';
                        } else {
                            buttonsHTML += `
                                    <button class="pagination-btn ${page === currentPage ? 'active' : ''}" 
                                            onclick="goToPage(${page})">
                                        ${page}
                                    </button>
                                `;
                        }
                    });

                    buttonsHTML += `
                            <button class="pagination-btn prev-next" 
                                    onclick="goToPage(${currentPage + 1})" 
                                    ${currentPage === totalPages ? 'disabled' : ''}>
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        `;

                    buttonsContainer.innerHTML = buttonsHTML;
                }

                function getPageNumbers(current, total) {
                    const pages = [];

                    if (total <= 7) {
                        for (let i = 1; i <= total; i++) pages.push(i);
                    } else {
                        pages.push(1);
                        if (current > 3) pages.push('...');
                        for (let i = Math.max(2, current - 1); i <= Math.min(total - 1, current + 1); i++) pages.push(
                        i);
                        if (current < total - 2) pages.push('...');
                        pages.push(total);
                    }

                    return pages;
                }

                function goToPage(page) {
                    const totalPages = Math.ceil(filteredReports.length / itemsPerPage);
                    if (page < 1 || page > totalPages) return;
                    currentPage = page;
                    renderCurrentPage();
                    renderPagination();
                    document.querySelector('.reports-section').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }

                // Search & filter
                let searchTimer;
                document.getElementById('searchInput').addEventListener('input', function() {
                    clearTimeout(searchTimer);
                    searchTimer = setTimeout(() => loadReports(), 350);
                });

                document.getElementById('filterStatus').addEventListener('change', function() {
                    loadReports();
                });

                document.getElementById('filterKategori').addEventListener('change', function() {
                    loadReports();
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
                                            <img src="/storage/${r.foto_bukti}" alt="Foto Bukti" style="max-width: 100%; border-radius: 12px; margin-top: 0.5rem; box-shadow: var(--shadow);">
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

                // Edit status & feedback
                function editReport(id, currentStatus, currentFeedback) {
                    document.getElementById('editId').value = id;
                    document.getElementById('editStatus').value = currentStatus;
                    document.getElementById('adminFeedback').value = currentFeedback || '';
                    openModal('editModal');
                    highlightFeedbackIfNeeded(currentStatus);
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const statusSelect = document.getElementById('editStatus');
                    if (statusSelect) {
                        statusSelect.addEventListener('change', function() {
                            highlightFeedbackIfNeeded(this.value);
                        });
                    }
                });

                function highlightFeedbackIfNeeded(status) {
                    const feedbackTextarea = document.getElementById('adminFeedback');
                    const feedbackGroup = feedbackTextarea.closest('.form-group');

                    if (status === 'Selesai' || status === 'Ditolak') {
                        feedbackTextarea.style.borderColor = 'var(--danger)';
                        feedbackTextarea.style.borderWidth = '3px';
                        feedbackGroup.querySelector('label').style.color = 'var(--danger)';
                    } else {
                        feedbackTextarea.style.borderColor = 'var(--gray-200)';
                        feedbackTextarea.style.borderWidth = '2px';
                        feedbackGroup.querySelector('label').style.color = 'var(--primary)';
                    }
                }

                async function submitEditStatus() {
                    const id = document.getElementById('editId').value;
                    const status = document.getElementById('editStatus').value;
                    const feedback = document.getElementById('adminFeedback').value.trim();

                    if ((status === 'Selesai' || status === 'Ditolak') && !feedback) {
                        showNotification(
                            'Pesan Diperlukan!',
                            'Harap berikan feedback kepada user untuk status ini.',
                            'error'
                        );
                        return;
                    }

                    currentEditData = {
                        id,
                        status,
                        feedback
                    };

                    const currentReport = allReports.find(r => r.id == id);
                    if (currentReport) {
                        similarReports = findSimilarReports(currentReport);
                        if (similarReports.length > 0) {
                            showBatchUpdateModal(currentReport, similarReports);
                            return;
                        }
                    }

                    await performUpdate([id], status, feedback);
                }

                function findSimilarReports(currentReport) {
                    return allReports.filter(r =>
                        r.id !== currentReport.id &&
                        r.jenis_sarana === currentReport.jenis_sarana &&
                        r.lokasi === currentReport.lokasi &&
                        r.tingkat_kerusakan === currentReport.tingkat_kerusakan &&
                        r.status !== 'Selesai' && r.status !== 'Ditolak'
                    );
                }

                function showBatchUpdateModal(currentReport, similar) {
                    const kategoriIcon = currentReport.kategori === 'sarana' ? 'fa-chair' : 'fa-school';

                    document.getElementById('similarCount').textContent = similar.length;
                    document.getElementById('batchCount').textContent = similar.length + 1;

                    const criteriaHTML = `
                            <li><i class="fas ${kategoriIcon}" style="color: var(--secondary);"></i> <strong>Jenis:</strong> ${escapeHtml(currentReport.jenis_sarana)}</li>
                            <li><i class="fas fa-map-marker-alt" style="color: var(--secondary);"></i> <strong>Lokasi:</strong> ${escapeHtml(currentReport.lokasi)}</li>
                            <li><i class="fas fa-exclamation-triangle" style="color: var(--secondary);"></i> <strong>Tingkat:</strong> ${escapeHtml(currentReport.tingkat_kerusakan)}</li>
                        `;
                    document.getElementById('similarCriteria').innerHTML = criteriaHTML;

                    const allIds = [currentReport.id, ...similar.map(r => r.id)];
                    document.getElementById('batchReportIds').value = JSON.stringify(allIds);

                    closeModal('editModal');
                    openModal('batchUpdateModal');
                }

                async function updateSingleReport() {
                    closeModal('batchUpdateModal');
                    const {
                        id,
                        status,
                        feedback
                    } = currentEditData;
                    await performUpdate([id], status, feedback);
                }

                async function updateBatchReports() {
                    closeModal('batchUpdateModal');
                    const ids = JSON.parse(document.getElementById('batchReportIds').value);
                    const {
                        status,
                        feedback
                    } = currentEditData;
                    await performUpdate(ids, status, feedback);
                }

                async function performUpdate(ids, status, feedback) {
                    try {
                        let successCount = 0;
                        let failCount = 0;

                        for (const id of ids) {
                            try {
                                const res = await fetch(BASE + '/reports/' + id + '/status', {
                                    method: 'PUT',
                                    headers: headers(),
                                    body: JSON.stringify({
                                        status,
                                        admin_feedback: feedback || null
                                    })
                                });

                                if (res.ok) successCount++;
                                else failCount++;
                            } catch (e) {
                                failCount++;
                            }
                        }

                        if (ids.length === 1) {
                            showNotification(
                                successCount > 0 ? 'Berhasil!' : 'Error',
                                successCount > 0 ? 'Status berhasil diupdate!' : 'Gagal update status.',
                                successCount > 0 ? 'success' : 'error'
                            );
                        } else {
                            showNotification(
                                successCount > 0 ? 'Berhasil!' : 'Error',
                                `${successCount} laporan berhasil diupdate${failCount > 0 ? `, ${failCount} gagal` : ''}!`,
                                successCount === ids.length ? 'success' : 'error'
                            );
                        }

                        loadReports();
                    } catch (e) {
                        showNotification('Error', 'Gagal update status.', 'error');
                    }
                }

                // Delete
                function openDeleteModal(id, nama) {
                    document.getElementById('deleteId').value = id;
                    document.getElementById('deleteText').innerHTML =
                        `<i class="fas fa-exclamation-triangle" style="color: var(--danger);"></i> Apakah Anda yakin ingin menghapus laporan dari <strong>${nama}</strong>?`;
                        openModal('deleteModal');
                    }

                    async function submitDelete() {
                        const id = document.getElementById('deleteId').value;

                        try {
                            const res = await fetch(BASE + '/reports/' + id, {
                                method: 'DELETE',
                                headers: headers()
                            });
                            const json = await res.json();

                            if (res.ok && json.success) {
                                closeModal('deleteModal');
                                loadReports();
                                showNotification('Berhasil!', 'Laporan berhasil dihapus!', 'success');
                            }
                        } catch (e) {
                            showNotification('Error', 'Gagal menghapus laporan.', 'error');
                        }
                    }

                    // Init
                    loadReports();
    </script>
</body>

</html>
