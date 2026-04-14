<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Riwayat Laporan - SiLaras</title>
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

        /* Main Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 5% 4rem;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: slideInDown 0.6s ease;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-title {
            font-family: 'Sora', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }

        .page-subtitle {
            color: var(--gray-500);
            font-size: 1.1rem;
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 1.8rem;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            border: 1px solid rgba(79, 70, 229, 0.1);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-xl);
            border-color: var(--secondary);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.diproses {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
        }

        .stat-icon.selesai {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .stat-icon.ditolak {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        .stat-info h3 {
            font-size: 0.9rem;
            color: var(--gray-500);
            margin-bottom: 0.3rem;
            font-weight: 500;
        }

        .stat-number {
            font-family: 'Sora', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--gray-800);
            line-height: 1;
        }

        /* Search & Filter Section */
        .controls-section {
            background: white;
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            margin-bottom: 2rem;
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .search-box {
            flex: 2;
            min-width: 300px;
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1rem;
        }

        .search-box input {
            width: 100%;
            padding: 1rem 1.2rem 1rem 3.2rem;
            border: 2px solid var(--gray-200);
            border-radius: 16px;
            font-size: 0.95rem;
            transition: all 0.3s;
            font-family: 'Inter', sans-serif;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .filter-group {
            flex: 1;
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .filter-box {
            flex: 1;
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
            padding: 1rem 1rem 1rem 2.8rem;
            border: 2px solid var(--gray-200);
            border-radius: 16px;
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
            background-size: 1rem;
        }

        .filter-box select:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .reset-btn {
            background: var(--gray-100);
            color: var(--gray-600);
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .reset-btn:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
        }

        /* Status Tabs */
        .status-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2.5rem;
            background: white;
            padding: 1.2rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow-x: auto;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .tab {
            flex: 1;
            min-width: 150px;
            padding: 1.2rem 1.5rem;
            border: 2px solid transparent;
            border-radius: 16px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            background: var(--gray-50);
            color: var(--gray-600);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
        }

        .tab i {
            font-size: 1.1rem;
        }

        .tab:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
            border-color: var(--gray-300);
        }

        .tab.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            box-shadow: var(--shadow-colored);
            border-color: transparent;
        }

        .tab.active i {
            color: white;
        }

        .tab-count {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.8rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-left: 0.5rem;
        }

        .tab.active .tab-count {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Reports Grid */
        .reports-grid {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .reports-grid.active {
            display: grid;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Report Card */
        .report-card {
            background: white;
            border-radius: 28px;
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .report-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
        }

        .report-card.diproses::before {
            background: linear-gradient(90deg, #3b82f6, #2563eb);
        }

        .report-card.selesai::before {
            background: linear-gradient(90deg, var(--success), #059669);
        }

        .report-card.ditolak::before {
            background: linear-gradient(90deg, var(--danger), #dc2626);
        }

        .report-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--secondary);
        }

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .report-id {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            font-size: 1.3rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .status-badge {
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .status-badge.diproses {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        .status-badge.selesai {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #86efac;
        }

        .status-badge.ditolak {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 1rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .category-badge.sarana {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border: 1px solid #86efac;
        }

        .category-badge.prasarana {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        .report-title {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--gray-800);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .report-meta {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            color: var(--gray-500);
            font-size: 0.9rem;
            margin-bottom: 1.2rem;
            background: var(--gray-50);
            padding: 1rem;
            border-radius: 16px;
        }

        .report-meta span {
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .report-meta i {
            width: 18px;
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .feedback-box {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            border-left: 4px solid var(--secondary);
            padding: 1.2rem;
            border-radius: 16px;
            margin: 1.2rem 0;
            position: relative;
        }

        .feedback-box::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 10px;
            font-size: 3rem;
            color: var(--secondary);
            opacity: 0.2;
            font-family: serif;
        }

        .feedback-label {
            font-weight: 700;
            font-size: 0.75rem;
            color: var(--secondary);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .feedback-text {
            color: var(--gray-700);
            font-size: 0.95rem;
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        .report-actions {
            margin-top: 1.5rem;
        }

        .btn-detail {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 16px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-colored);
        }

        .btn-detail:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }

        .btn-detail i {
            font-size: 0.9rem;
            transition: transform 0.3s;
        }

        .btn-detail:hover i {
            transform: translateX(5px);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 5rem 3rem;
            background: white;
            border-radius: 28px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(79, 70, 229, 0.1);
            grid-column: 1 / -1;
            animation: fadeIn 0.5s ease;
        }

        .empty-icon {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            color: var(--gray-300);
        }

        .empty-title {
            font-family: 'Sora', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--gray-700);
            margin-bottom: 0.8rem;
        }

        .empty-text {
            color: var(--gray-500);
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            text-decoration: none;
            border-radius: 16px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: var(--shadow-colored);
        }

        .btn-create:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .modal-content {
            background: white;
            border-radius: 32px;
            width: 90%;
            max-width: 750px;
            max-height: 85vh;
            overflow-y: auto;
            animation: modalSlideUp 0.3s ease;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        @keyframes modalSlideUp {
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
            padding: 2.5rem 2.5rem 1.5rem;
            border-bottom: 2px solid var(--gray-100);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .modal-header i {
            font-size: 2rem;
            color: var(--secondary);
        }

        .modal-header h3 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }

        .modal-body {
            padding: 2.5rem;
        }

        .detail-item {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .detail-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-label i {
            color: var(--secondary);
            font-size: 0.8rem;
        }

        .detail-value {
            color: var(--gray-800);
            font-size: 1rem;
            line-height: 1.7;
            font-weight: 500;
            background: var(--gray-50);
            padding: 0.8rem 1rem;
            border-radius: 12px;
            border: 1px solid var(--gray-200);
        }

        .detail-image {
            width: 100%;
            border-radius: 20px;
            margin-top: 0.8rem;
            box-shadow: var(--shadow-lg);
            border: 3px solid white;
        }

        .modal-footer {
            padding: 1.5rem 2.5rem 2.5rem;
            display: flex;
            justify-content: flex-end;
        }

        .btn-close {
            padding: 1rem 2.5rem;
            background: var(--gray-100);
            color: var(--gray-600);
            border: none;
            border-radius: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-close:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
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
        @media (max-width: 1024px) {
            .stats-container {
                grid-template-columns: repeat(3, 1fr);
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

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

            .page-title {
                font-size: 2.2rem;
            }

            .controls-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                min-width: auto;
            }

            .filter-group {
                flex-direction: column;
            }

            .filter-box {
                width: 100%;
            }

            .filter-box select {
                width: 100%;
            }

            .status-tabs {
                flex-direction: column;
            }

            .tab {
                min-width: auto;
            }

            .reports-grid {
                grid-template-columns: 1fr;
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

        @media (max-width: 640px) {
            .page-title {
                font-size: 1.8rem;
            }

            .stats-container {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 1rem 1rem 3rem;
            }

            .modal-content {
                padding: 0;
            }

            .modal-header {
                padding: 2rem 1.5rem 1rem;
            }

            .modal-header h3 {
                font-size: 1.6rem;
            }

            .modal-body {
                padding: 1.5rem;
            }

            .modal-footer {
                padding: 1rem 1.5rem 2rem;
            }
        }

        /* Loading Animation */
        .skeleton {
            background: linear-gradient(90deg, var(--gray-200) 25%, var(--gray-100) 50%, var(--gray-200) 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* Tooltip */
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gray-800);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            white-space: nowrap;
            z-index: 10;
            margin-bottom: 5px;
        }

        /* Print Styles */
        @media print {

            header,
            footer,
            .controls-section,
            .status-tabs,
            .report-actions {
                display: none;
            }

            .report-card {
                break-inside: avoid;
                border: 1px solid #ccc;
                box-shadow: none;
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
            <a href="/riwayat" class="active">Riwayat</a>
            <a href="/about">Tentang Kami</a>
            <div class="profile-icon">
                <a href="/profil"><i class="fas fa-user"></i></a>
            </div>
        </nav>
        <nav class="mobile-nav" id="mobileNav">
            <a href="/home"><i class="fas fa-home"></i> Beranda</a>
            <a href="/report"><i class="fas fa-plus-circle"></i> Buat Laporan</a>
            <a href="/riwayat" class="active"><i class="fas fa-history"></i> Riwayat</a>
            <a href="/about"><i class="fas fa-info-circle"></i> Tentang Kami</a>
            <a href="/profil"><i class="fas fa-user"></i> Profil</a>
        </nav>
    </header>

    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Riwayat Laporan</h1>
            <p class="page-subtitle">Pantau perkembangan dan status laporan Anda dengan mudah</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon diproses">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-info">
                    <h3>Sedang Diproses</h3>
                    <div class="stat-number" id="stat-diproses">0</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon selesai">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>Selesai</h3>
                    <div class="stat-number" id="stat-selesai">0</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon ditolak">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>Ditolak</h3>
                    <div class="stat-number" id="stat-ditolak">0</div>
                </div>
            </div>
        </div>

        <!-- Search & Filter Controls -->
        <div class="controls-section">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari berdasarkan jenis, lokasi, atau deskripsi..."
                    onkeyup="performSearch()">
            </div>
            <div class="filter-group">
                <div class="filter-box">
                    <i class="fas fa-tag"></i>
                    <select id="filterKategori" onchange="performSearch()">
                        <option value="">Semua Kategori</option>
                        <option value="sarana">🪑 Sarana</option>
                        <option value="prasarana">🏫 Prasarana</option>
                    </select>
                </div>
                <button class="reset-btn" onclick="resetFilters()">
                    <i class="fas fa-undo-alt"></i>
                    Reset
                </button>
            </div>
        </div>

        <!-- Status Tabs -->
        <div class="status-tabs">
            <div class="tab active" onclick="filterStatus('diproses')">
                <i class="fas fa-clock"></i>
                <span>Diproses</span>
                <span class="tab-count" id="count-diproses">0</span>
            </div>
            <div class="tab" onclick="filterStatus('selesai')">
                <i class="fas fa-check-circle"></i>
                <span>Selesai</span>
                <span class="tab-count" id="count-selesai">0</span>
            </div>
            <div class="tab" onclick="filterStatus('ditolak')">
                <i class="fas fa-times-circle"></i>
                <span>Ditolak</span>
                <span class="tab-count" id="count-ditolak">0</span>
            </div>
        </div>

        <!-- Diproses Reports -->
        <div class="reports-grid active" id="grid-diproses">
            @php
                $diprosesReports = $recentReports->where('status', 'Diproses');
            @endphp

            @if ($diprosesReports->count() > 0)
                @foreach ($diprosesReports as $report)
                    <div class="report-card diproses" data-status="diproses" data-kategori="{{ $report->kategori }}"
                        data-search="{{ strtolower($report->jenis_sarana . ' ' . $report->lokasi . ' ' . $report->deskripsi) }}">
                        <div class="report-header">
                            <div class="report-id">#{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}</div>
                            <div class="status-badge diproses">
                                <i class="fas fa-clock"></i>
                                Diproses
                            </div>
                        </div>

                        <div class="category-badge {{ $report->kategori }}">
                            <i class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                            {{ $report->kategori === 'sarana' ? 'Sarana' : 'Prasarana' }}
                        </div>

                        <div class="report-title">
                            <i class="fas fa-cog"></i>
                            {{ $report->jenis_sarana }}
                        </div>

                        <div class="report-meta">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $report->lokasi }}
                            </span>
                            <span>
                                <i class="fas fa-calendar-alt"></i>
                                {{ $report->tanggal_laporan->format('d M Y') }}
                            </span>
                            <span>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $report->tingkat_kerusakan }}
                            </span>
                        </div>

                        @if ($report->admin_feedback)
                            <div class="feedback-box">
                                <div class="feedback-label">
                                    <i class="fas fa-comment-dots"></i>
                                    Feedback Admin
                                </div>
                                <div class="feedback-text">{{ $report->admin_feedback }}</div>
                            </div>
                        @endif

                        <div class="report-actions">
                            <button class="btn-detail" onclick="viewDetail({{ $report->id }})">
                                Lihat Detail
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <div class="empty-title">Belum Ada Laporan Diproses</div>
                    <p class="empty-text">Laporan yang sedang diproses akan muncul di sini</p>
                    <a href="/report" class="btn-create">
                        <i class="fas fa-plus-circle"></i>
                        Buat Laporan Baru
                    </a>
                </div>
            @endif
        </div>

        <!-- Selesai Reports -->
        <div class="reports-grid" id="grid-selesai">
            @php
                $selesaiReports = $recentReports->where('status', 'Selesai');
            @endphp

            @if ($selesaiReports->count() > 0)
                @foreach ($selesaiReports as $report)
                    <div class="report-card selesai" data-status="selesai" data-kategori="{{ $report->kategori }}"
                        data-search="{{ strtolower($report->jenis_sarana . ' ' . $report->lokasi . ' ' . $report->deskripsi) }}">
                        <div class="report-header">
                            <div class="report-id">#{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}</div>
                            <div class="status-badge selesai">
                                <i class="fas fa-check-circle"></i>
                                Selesai
                            </div>
                        </div>

                        <div class="category-badge {{ $report->kategori }}">
                            <i class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                            {{ $report->kategori === 'sarana' ? 'Sarana' : 'Prasarana' }}
                        </div>

                        <div class="report-title">
                            <i class="fas fa-cog"></i>
                            {{ $report->jenis_sarana }}
                        </div>

                        <div class="report-meta">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $report->lokasi }}
                            </span>
                            <span>
                                <i class="fas fa-calendar-alt"></i>
                                {{ $report->tanggal_laporan->format('d M Y') }}
                            </span>
                            <span>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $report->tingkat_kerusakan }}
                            </span>
                        </div>

                        @if ($report->admin_feedback)
                            <div class="feedback-box">
                                <div class="feedback-label">
                                    <i class="fas fa-comment-dots"></i>
                                    Feedback Admin
                                </div>
                                <div class="feedback-text">{{ $report->admin_feedback }}</div>
                            </div>
                        @endif

                        <div class="report-actions">
                            <button class="btn-detail" onclick="viewDetail({{ $report->id }})">
                                Lihat Detail
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-check-circle" style="color: var(--success);"></i>
                    </div>
                    <div class="empty-title">Belum Ada Laporan Selesai</div>
                    <p class="empty-text">Laporan yang telah selesai diproses akan muncul di sini</p>
                </div>
            @endif
        </div>

        <!-- Ditolak Reports -->
        <div class="reports-grid" id="grid-ditolak">
            @php
                $ditolakReports = $recentReports->where('status', 'Ditolak');
            @endphp

            @if ($ditolakReports->count() > 0)
                @foreach ($ditolakReports as $report)
                    <div class="report-card ditolak" data-status="ditolak" data-kategori="{{ $report->kategori }}"
                        data-search="{{ strtolower($report->jenis_sarana . ' ' . $report->lokasi . ' ' . $report->deskripsi) }}">
                        <div class="report-header">
                            <div class="report-id">#{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}</div>
                            <div class="status-badge ditolak">
                                <i class="fas fa-times-circle"></i>
                                Ditolak
                            </div>
                        </div>

                        <div class="category-badge {{ $report->kategori }}">
                            <i class="fas fa-{{ $report->kategori === 'sarana' ? 'chair' : 'school' }}"></i>
                            {{ $report->kategori === 'sarana' ? 'Sarana' : 'Prasarana' }}
                        </div>

                        <div class="report-title">
                            <i class="fas fa-cog"></i>
                            {{ $report->jenis_sarana }}
                        </div>

                        <div class="report-meta">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $report->lokasi }}
                            </span>
                            <span>
                                <i class="fas fa-calendar-alt"></i>
                                {{ $report->tanggal_laporan->format('d M Y') }}
                            </span>
                            <span>
                                <i class="fas fa-exclamation-triangle"></i>
                                {{ $report->tingkat_kerusakan }}
                            </span>
                        </div>

                        @if ($report->admin_feedback)
                            <div class="feedback-box">
                                <div class="feedback-label">
                                    <i class="fas fa-comment-dots"></i>
                                    Feedback Admin
                                </div>
                                <div class="feedback-text">{{ $report->admin_feedback }}</div>
                            </div>
                        @endif

                        <div class="report-actions">
                            <button class="btn-detail" onclick="viewDetail({{ $report->id }})">
                                Lihat Detail
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-times-circle" style="color: var(--danger);"></i>
                    </div>
                    <div class="empty-title">Belum Ada Laporan Ditolak</div>
                    <p class="empty-text">Laporan yang ditolak akan muncul di sini</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal: Detail Report -->
    <div class="modal" id="detailModal" onclick="if(event.target === this) closeModal()">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-file-alt"></i>
                <h3>Detail Laporan</h3>
            </div>
            <div class="modal-body" id="detailContent">
                <!-- Content loaded via JavaScript -->
            </div>
            <div class="modal-footer">
                <button class="btn-close" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                    Tutup
                </button>
            </div>
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
        let currentStatus = 'diproses';

        // Update counts on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateCounts();
            updateStats();
        });

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

        function updateCounts() {
            const diprosesCount = document.querySelectorAll('[data-status="diproses"]').length;
            const selesaiCount = document.querySelectorAll('[data-status="selesai"]').length;
            const ditolakCount = document.querySelectorAll('[data-status="ditolak"]').length;

            document.getElementById('count-diproses').textContent = diprosesCount;
            document.getElementById('count-selesai').textContent = selesaiCount;
            document.getElementById('count-ditolak').textContent = ditolakCount;
        }

        function updateStats() {
            const diprosesCount = document.querySelectorAll('[data-status="diproses"]').length;
            const selesaiCount = document.querySelectorAll('[data-status="selesai"]').length;
            const ditolakCount = document.querySelectorAll('[data-status="ditolak"]').length;

            document.getElementById('stat-diproses').textContent = diprosesCount;
            document.getElementById('stat-selesai').textContent = selesaiCount;
            document.getElementById('stat-ditolak').textContent = ditolakCount;
        }

        // Filter by status
        function filterStatus(status) {
            currentStatus = status;

            // Update tabs
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            event.currentTarget.classList.add('active');

            // Update grids
            document.querySelectorAll('.reports-grid').forEach(grid => grid.classList.remove('active'));
            document.getElementById(`grid-${status}`).classList.add('active');

            // Reapply search/filter
            performSearch();
        }

        // Search and filter function
        function performSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const kategoriFilter = document.getElementById('filterKategori').value;
            const activeGrid = document.getElementById(`grid-${currentStatus}`);
            const cards = activeGrid.querySelectorAll('.report-card');

            let visibleCount = 0;

            cards.forEach(card => {
                if (!card.classList.contains('empty-state')) {
                    const searchData = card.getAttribute('data-search') || '';
                    const kategori = card.getAttribute('data-kategori') || '';

                    const matchSearch = searchData.includes(searchTerm);
                    const matchKategori = !kategoriFilter || kategori === kategoriFilter;

                    if (matchSearch && matchKategori) {
                        card.style.display = '';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                }
            });

            // Show/hide empty state message
            const emptyState = activeGrid.querySelector('.empty-state');
            const noResultsMsg = activeGrid.querySelector('.no-results-message');

            if (visibleCount === 0 && cards.length > 0) {
                if (!noResultsMsg) {
                    const message = document.createElement('div');
                    message.className = 'empty-state no-results-message';
                    message.innerHTML = `
                        <div class="empty-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="empty-title">Tidak Ada Hasil</div>
                        <p class="empty-text">Tidak ditemukan laporan yang sesuai dengan pencarian Anda</p>
                        <button class="reset-btn" onclick="resetFilters()">
                            <i class="fas fa-undo-alt"></i>
                            Reset Filter
                        </button>
                    `;
                    activeGrid.appendChild(message);
                }
            } else {
                const msg = activeGrid.querySelector('.no-results-message');
                if (msg) msg.remove();
            }
        }

        // Reset filters
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('filterKategori').value = '';
            performSearch();
        }

        // View detail
        async function viewDetail(id) {
            try {
                const response = await fetch(`/api/riwayat/${id}`);
                const data = await response.json();
                const report = data.data;

                const kategoriIcon = report.kategori === 'sarana' ? 'chair' : 'school';
                const kategoriLabel = report.kategori === 'sarana' ? 'Sarana' : 'Prasarana';
                const statusClass = report.status.toLowerCase();

                let html = `
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-hashtag"></i> ID Laporan</div>
                        <div class="detail-value">#${String(report.id).padStart(3, '0')}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-tag"></i> Kategori</div>
                        <div class="detail-value">
                            <i class="fas fa-${kategoriIcon}"></i> ${kategoriLabel}
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-cog"></i> Jenis ${kategoriLabel}</div>
                        <div class="detail-value">${escapeHtml(report.jenis_sarana)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-map-marker-alt"></i> Lokasi</div>
                        <div class="detail-value">${escapeHtml(report.lokasi)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-exclamation-triangle"></i> Tingkat Kerusakan</div>
                        <div class="detail-value">${escapeHtml(report.tingkat_kerusakan)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-align-left"></i> Deskripsi</div>
                        <div class="detail-value">${escapeHtml(report.deskripsi)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-calendar-alt"></i> Tanggal Laporan</div>
                        <div class="detail-value">${formatDate(report.tanggal_laporan)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"><i class="fas fa-info-circle"></i> Status</div>
                        <div class="detail-value">
                            <span class="status-badge ${statusClass}">
                                <i class="fas ${getStatusIcon(report.status)}"></i>
                                ${report.status}
                            </span>
                        </div>
                    </div>
                `;

                if (report.admin_feedback) {
                    html += `
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-comment-dots"></i> Feedback Admin</div>
                            <div class="detail-value">
                                <div class="feedback-box">
                                    <div class="feedback-text">${escapeHtml(report.admin_feedback)}</div>
                                </div>
                            </div>
                        </div>
                    `;
                }

                if (report.foto_bukti) {
                    html += `
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-camera"></i> Foto Bukti</div>
                            <div class="detail-value">
                                <img src="/storage/${report.foto_bukti}" alt="Foto Bukti" class="detail-image">
                            </div>
                        </div>
                    `;
                }

                document.getElementById('detailContent').innerHTML = html;
                document.getElementById('detailModal').classList.add('active');
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal memuat detail laporan');
            }
        }

        function getStatusIcon(status) {
            switch (status.toLowerCase()) {
                case 'diproses':
                    return 'fa-clock';
                case 'selesai':
                    return 'fa-check-circle';
                case 'ditolak':
                    return 'fa-times-circle';
                default:
                    return 'fa-info-circle';
            }
        }

        function escapeHtml(text) {
            if (!text) return '-';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        function formatDate(dateString) {
            if (!dateString) return '-';
            try {
                const date = new Date(dateString);
                return date.toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });
            } catch {
                return dateString;
            }
        }

        // load more
        let current = 6;
        document.getElementById("loadMoreBtn").onclick = function() {
            let items = document.querySelectorAll(".report-item");

            for (let i = current; i < current + 6; i++) {
                if (items[i]) {
                    items[i].style.display = "block";
                }
            }

            current += 6;

            if (current >= items.length) {
                this.style.display = "none";
            }
        }


        // Close modal
        function closeModal() {
            document.getElementById('detailModal').classList.remove('active');
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>

</html>
