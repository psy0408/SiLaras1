<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - SiLaras</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
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
            background: linear-gradient(135deg, var(--gray-50) 0%, #f0f3ff 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.5;
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

        /* Main Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem 5%;
        }

        /* Greeting Section */
        .greeting {
            margin-bottom: 2.5rem;
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

        .greeting h1 {
            font-family: 'Sora', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .greeting p {
            color: var(--gray-500);
            font-size: 1.1rem;
            font-weight: 400;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 1.8rem 1.5rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(79, 70, 229, 0.1);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary), var(--accent));
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(79, 70, 229, 0.2);
        }

        .stat-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--gray-500);
            margin-bottom: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-family: 'Sora', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Create Report Section */
        .create-report-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 80%, var(--accent) 100%);
            border-radius: 24px;
            padding: 2.8rem 3rem;
            margin-bottom: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow-xl);
            position: relative;
            overflow: hidden;
        }

        .create-report-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .create-report-section::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0) 70%);
            border-radius: 50%;
        }

        .create-report-section h2 {
            font-family: 'Sora', sans-serif;
            font-size: 2rem;
            color: white;
            font-weight: 700;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .create-report-section h2 i {
            margin-right: 0.5rem;
            opacity: 0.9;
        }

        .report-btn {
            background: white;
            color: var(--primary);
            padding: 1.1rem 3rem;
            border: none;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            z-index: 1;
        }

        .report-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            background: var(--gray-50);
        }

        .report-btn i {
            font-size: 1.2rem;
        }

        /* Recent Reports Section */
        .recent-reports {
            margin-bottom: 3rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.8rem;
        }

        .section-header h2 {
            font-family: 'Sora', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-header h2 i {
            color: var(--secondary);
            font-size: 2rem;
        }

        .view-all {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            background: rgba(79, 70, 229, 0.1);
        }

        .view-all:hover {
            background: rgba(79, 70, 229, 0.2);
            transform: translateX(5px);
        }

        .reports-list {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .report-item {
            background: white;
            border-radius: 20px;
            padding: 1.5rem 2rem;
            display: grid;
            grid-template-columns: 100px 1fr auto auto auto;
            align-items: center;
            gap: 1.5rem;
            box-shadow: var(--shadow);
            transition: all 0.3s;
            border: 1px solid var(--gray-200);
            position: relative;
        }

        .report-item:hover {
            transform: translateX(5px);
            box-shadow: var(--shadow-md);
            border-color: var(--secondary-light);
        }

        .report-number {
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            color: var(--secondary);
            font-size: 1.1rem;
            background: rgba(79, 70, 229, 0.1);
            padding: 0.4rem 0.8rem;
            border-radius: 30px;
            text-align: center;
            display: inline-block;
            width: fit-content;
        }

        .report-info {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .report-description {
            font-size: 1rem;
            color: var(--gray-800);
            font-weight: 600;
        }

        .report-date {
            font-size: 0.85rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .report-date i {
            color: var(--gray-400);
            font-size: 0.8rem;
        }

        .report-status {
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.8rem;
            text-align: center;
            text-transform: capitalize;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        .status-selesai {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            color: #166534;
            border: 1px solid #86efac;
        }

        .status-ditolak {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .status-pending {
            background: linear-gradient(135deg, #fef9c3 0%, #fef08a 100%);
            color: #854d0e;
            border: 1px solid #fde047;
        }

        .status-diproses {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        .action-buttons {
            display: flex;
            gap: 0.8rem;
            align-items: center;
        }

        .btn-detail {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            box-shadow: var(--shadow-colored);
        }

        .btn-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.3);
        }

        .btn-feedback {
            background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
            position: relative;
        }

        .btn-feedback:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3);
        }

        /* Tooltip */
        .tooltip-wrapper {
            position: relative;
            display: inline-block;
        }

        .feedback-tooltip {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            bottom: calc(100% + 15px);
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background: white;
            color: var(--gray-800);
            padding: 1.2rem 1.5rem;
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            z-index: 10000;
            width: 320px;
            transition: all 0.3s ease;
            pointer-events: none;
            border: 2px solid var(--warning);
        }

        .feedback-tooltip::before {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 10px solid transparent;
            border-top-color: var(--warning);
        }

        .feedback-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(-3px);
            border: 8px solid transparent;
            border-top-color: white;
        }

        .tooltip-wrapper:hover .feedback-tooltip {
            visibility: visible;
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        .feedback-tooltip-header {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.8rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-bottom: 2px solid var(--gray-100);
            padding-bottom: 0.5rem;
        }

        .feedback-tooltip-header i {
            color: var(--warning);
        }

        .feedback-tooltip-content {
            color: var(--gray-600);
            line-height: 1.6;
            font-size: 0.9rem;
            text-align: left;
            max-height: 150px;
            overflow-y: auto;
        }

        .feedback-tooltip-content::-webkit-scrollbar {
            width: 4px;
        }

        .feedback-tooltip-content::-webkit-scrollbar-track {
            background: var(--gray-100);
            border-radius: 4px;
        }

        .feedback-tooltip-content::-webkit-scrollbar-thumb {
            background: var(--secondary);
            border-radius: 4px;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 28px;
            width: 90%;
            max-width: 700px;
            max-height: 85vh;
            overflow-y: auto;
            animation: modalFadeIn 0.3s ease;
            box-shadow: var(--shadow-xl);
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-content h3 {
            font-family: 'Sora', sans-serif;
            color: var(--primary);
            font-size: 1.8rem;
            margin-bottom: 2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            border-bottom: 2px solid var(--gray-100);
            padding-bottom: 1rem;
        }

        .modal-content h3 i {
            color: var(--secondary);
            font-size: 1.8rem;
        }

        .detail-item {
            display: flex;
            padding: 1.2rem 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: var(--gray-600);
            width: 150px;
            flex-shrink: 0;
            font-size: 0.9rem;
        }

        .detail-value {
            color: var(--gray-800);
            flex: 1;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .feedback-box {
            background: linear-gradient(135deg, #f0f3ff 0%, #e8ecff 100%);
            padding: 1.2rem;
            border-radius: 16px;
            border-left: 4px solid var(--secondary);
            margin-top: 0.5rem;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            justify-content: flex-end;
        }

        .btn-cancel {
            background: var(--gray-100);
            color: var(--gray-600);
            padding: 0.9rem 2rem;
            border: none;
            border-radius: 14px;
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

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 3rem;
            background: white;
            border-radius: 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            color: var(--gray-300);
        }

        .empty-state p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: var(--gray-500);
            font-weight: 500;
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

        .footer-section h4 i {
            color: var(--secondary-light);
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
            transform: translateX(3px);
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
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
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

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .create-report-section {
                flex-direction: column;
                gap: 2rem;
                text-align: center;
                padding: 2rem;
            }

            .create-report-section h2 {
                font-size: 1.6rem;
            }

            .report-item {
                grid-template-columns: 1fr;
                gap: 1.2rem;
                padding: 1.5rem;
            }

            .action-buttons {
                flex-wrap: wrap;
            }

            .btn-detail,
            .btn-feedback {
                flex: 1;
            }

            .greeting h1 {
                font-size: 2rem;
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
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .greeting h1 {
                font-size: 1.8rem;
            }

            .modal-content {
                padding: 2rem 1.5rem;
            }

            .detail-item {
                flex-direction: column;
                gap: 0.3rem;
            }

            .detail-label {
                width: 100%;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-detail,
            .btn-feedback {
                width: 100%;
            }

            .feedback-tooltip {
                width: 250px;
                left: 50%;
                transform: translateX(-50%);
            }
        }

        /* Utility Classes */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo-silaras.png') }}" alt="SiLaras Logo">
        </div>
        <button class="mobile-menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </button>
        <nav id="desktopNav">
            <a href="/home" class="active">Beranda</a>
            <a href="/report">Buat Laporan</a>
            <a href="/riwayat">Riwayat</a>
            <a href="/about">Tentang Kami</a>
            <div class="profile-icon">
                <a href="/profil"><i class="fas fa-user"></i></a>
            </div>
        </nav>
        <nav class="mobile-nav" id="mobileNav">
            <a href="/home" class="active"><i class="fas fa-home"></i> Beranda</a>
            <a href="/report"><i class="fas fa-plus-circle"></i> Buat Laporan</a>
            <a href="/riwayat"><i class="fas fa-history"></i> Riwayat</a>
            <a href="/about"><i class="fas fa-info-circle"></i> Tentang Kami</a>
            <a href="/profil"><i class="fas fa-user"></i> Profil</a>
        </nav>
    </header>

    <div class="container">
        <!-- Greeting Section -->
        <div class="greeting">
            <h1>Halo, {{ auth()->user()->name }}! </h1>
            <p>Selamat datang kembali di dashboard SiLaras</p>
        </div>

        <!-- Statistics Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Laporan</div>
                <div class="stat-value">{{ $totalReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Pending</div>
                <div class="stat-value">{{ $pendingReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Diproses</div>
                <div class="stat-value">{{ $diprosesReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Selesai</div>
                <div class="stat-value">{{ $selesaiReports }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Ditolak</div>
                <div class="stat-value">{{ $ditolakReports }}</div>
            </div>
        </div>
        
        <!-- Create Report CTA -->
        <div class="create-report-section">
            <h2>
                <i class="fas fa-pen-fancy"></i>
                Buat Laporan Baru
            </h2>
            <a href="/report" class="report-btn">
                <i class="fas fa-plus-circle"></i>
                Buat Laporan
            </a>
        </div>

        <!-- Recent Reports -->
        <div class="recent-reports">
            <div class="section-header">
                <h2>
                    <i class="fas fa-clipboard-list"></i>
                    Laporan Terbaru
                </h2>
                @if($recentReports->count() > 0)
                    <a href="/riwayat" class="view-all">
                        Lihat Semua
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @endif
            </div>
            
            @if($recentReports->count() > 0)
                <div class="reports-list">
                    @foreach($recentReports as $report)
                        <div class="report-item">
                            <span class="report-number">
                                #{{ str_pad($report->id, 3, '0', STR_PAD_LEFT) }}
                            </span>
                            
                            <div class="report-info">
                                <div class="report-description">{{ $report->jenis_sarana }}</div>
                                <div class="report-date">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $report->tanggal_laporan->format('d M Y') }}
                                </div>
                            </div>
                            
                            <div class="action-buttons">
                                @if($report->admin_feedback)
                                    <div class="tooltip-wrapper">
                                        <button class="btn-feedback">
                                            <i class="fas fa-comment-dots"></i>
                                            Pesan
                                        </button>
                                        <div class="feedback-tooltip">
                                            <div class="feedback-tooltip-header">
                                                <i class="fas fa-comment"></i>
                                                Feedback Admin
                                            </div>
                                            <div class="feedback-tooltip-content">
                                                {{ $report->admin_feedback }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                                <button class="btn-detail" onclick="viewDetail({{ $report->id }})">
                                    <i class="fas fa-eye"></i>
                                    Detail
                                </button>
                            </div>
                            
                            <span class="report-status status-{{ strtolower($report->status) }}">
                                {{ $report->status }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    <p>Belum ada laporan yang dibuat</p>
                    <a href="/report" class="btn-detail">
                        <i class="fas fa-plus-circle"></i>
                        Buat Laporan Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Detail Modal -->
    <div class="modal" id="detailModal">
        <div class="modal-content">
            <h3>
                <i class="fas fa-file-alt"></i>
                Detail Laporan
            </h3>
            <div id="detailContent"></div>
            <div class="modal-buttons">
                <button class="btn-cancel" onclick="closeModal('detailModal')">
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
                    <p>Sistem Laporan Sarana Sekolah yang memudahkan siswa melaporkan kerusakan fasilitas dengan cepat, mudah, dan transparan.</p>
                    <div class="social-links">
                        <a href="#" class="social-link" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <i class="fab fa-twitter"></i>
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
        const CSRF = document.querySelector('meta[name="csrf-token"]')?.content || '';
        const BASE = '{{ url("/api") }}';

        const headers = () => ({
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': CSRF,
            'Accept': 'application/json',
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

        // Modal functions
        function openModal(id) { 
            document.getElementById(id)?.classList.add('active'); 
        }

        function closeModal(id) { 
            document.getElementById(id)?.classList.remove('active'); 
        }

        // Close modal when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', e => { 
                if (e.target === modal) closeModal(modal.id); 
            });
        });

        // View detail function
        async function viewDetail(reportId) {
            try {
                const response = await fetch(`${BASE}/reports/${reportId}`, { 
                    headers: headers() 
                });
                
                if (!response.ok) throw new Error('Failed to fetch');
                
                const json = await response.json();
                const report = json.data;

                const kategoriIcon = report.kategori === 'sarana' ? 'fa-chair' : 'fa-building';
                const kategoriLabel = report.kategori === 'sarana' ? 'Sarana' : 'Prasarana';

                let detailHTML = `
                    <div class="detail-item">
                        <div class="detail-label">Kategori</div>
                        <div class="detail-value">
                            <i class="fas ${kategoriIcon}"></i> ${kategoriLabel}
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Nama Pelapor</div>
                        <div class="detail-value">${escapeHtml(report.nama_pelapor)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Username</div>
                        <div class="detail-value">${escapeHtml(report.username)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Kelas</div>
                        <div class="detail-value">${escapeHtml(report.kelas)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Jurusan</div>
                        <div class="detail-value">${escapeHtml(report.jurusan)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Jenis ${kategoriLabel}</div>
                        <div class="detail-value">${escapeHtml(report.jenis_sarana)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Tingkat Kerusakan</div>
                        <div class="detail-value">${escapeHtml(report.tingkat_kerusakan)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Lokasi</div>
                        <div class="detail-value">${escapeHtml(report.lokasi)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Deskripsi</div>
                        <div class="detail-value">${escapeHtml(report.deskripsi)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Tanggal Laporan</div>
                        <div class="detail-value">${formatDate(report.tanggal_laporan)}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value">
                            <span class="report-status status-${report.status.toLowerCase()}">
                                ${report.status}
                            </span>
                        </div>
                    </div>
                `;

                if (report.admin_feedback) {
                    detailHTML += `
                        <div class="detail-item">
                            <div class="detail-label">Feedback Admin</div>
                            <div class="detail-value">
                                <div class="feedback-box">
                                    <i class="fas fa-quote-left" style="color: var(--secondary); opacity: 0.5;"></i>
                                    ${escapeHtml(report.admin_feedback)}
                                </div>
                            </div>
                        </div>
                    `;
                }

                if (report.foto_bukti) {
                    detailHTML += `
                        <div class="detail-item">
                            <div class="detail-label">Foto Bukti</div>
                            <div class="detail-value">
                                <img src="/storage/${report.foto_bukti}" 
                                     alt="Foto Bukti" 
                                     style="max-width: 100%; border-radius: 16px; margin-top: 0.5rem; box-shadow: var(--shadow);">
                            </div>
                        </div>
                    `;
                }

                document.getElementById('detailContent').innerHTML = detailHTML;
                openModal('detailModal');
            } catch (error) {
                console.error('Error:', error);
                alert('Gagal memuat detail laporan. Silakan coba lagi.');
            }
        }

        // Utility functions
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text || '-';
            return div.innerHTML;
        }

        function formatDate(dateString) {
            if (!dateString) return '-';
            try {
                const date = new Date(dateString);
                return date.toLocaleDateString('id-ID', { 
                    day: '2-digit', 
                    month: 'long', 
                    year: 'numeric' 
                });
            } catch {
                return dateString;
            }
        }

        // Add active class to current navigation
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('nav a').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>