

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KoliBusiness - Website Builder</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== BASE STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body, html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            transition: all 0.3s ease;
        }

        /* ===== SMOOTH SCROLLING ===== */
        html {
            scroll-behavior: smooth;
        }

        @media screen and (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
        }

        /* ===== BACKGROUND OPTIONS ===== */
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
        }

        #bg-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
            background: #000;
            display: none;
        }

        #bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            background: url('https://images.pexels.com/photos/13214707/pexels-photo-13214707.jpeg?auto=compress&cs=tinysrgb&w=1200') no-repeat center center;
            background-size: cover;
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        /* ===== ADMIN PANEL & THEME SWITCHER ===== */
        .admin-btn {
            position: fixed;
            top: 20px;
            right: 220px;
            padding: 12px 20px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .admin-btn:hover {
            background: #1976D2;
            transform: translateY(-2px);
        }

        .admin-panel {
            position: fixed;
            top: 80px;
            right: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            width: 350px;
            max-height: 80vh;
            overflow-y: auto;
            z-index: 999;
            display: none;
        }

        .admin-panel.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        .admin-search {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            transition: border 0.3s;
        }

        .form-control:focus {
            border-color: #2196F3;
            outline: none;
        }

        .btn {
            padding: 10px 15px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn:hover {
            background: #1976D2;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #f44336;
        }

        .btn-danger:hover {
            background: #e53935;
        }

        .btn-primary {
            background: #2196F3;
        }

        .btn-primary:hover {
            background: #1976D2;
        }

        /* ===== ROUND BUTTON ===== */
        .btn-round {
            width: 45px;
            height: 45px;
            padding: 0;
            border-radius: 40%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        /* ===== SOCIAL MEDIA ICONS ===== */
        .social-icons {
            position: fixed;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 100;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
            animation: blink 2s infinite;
        }

        .social-icon:hover {
            transform: scale(1.1);
            background: rgba(255,255,255,0.3);
        }

        @keyframes blink {
            0% { opacity: 0.7; }
            50% { opacity: 1; }
            100% { opacity: 0.7; }
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 5%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            z-index: 100;
            transition: all 0.3s;
        }

        .logo {
            position: absolute;
            left: 5%;
            color: white;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-img {
            height: 30px;
            width: auto;
            border-radius: 50%;
        }

        .logo:hover {
            color: #2196F3;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #2196F3;
        }

        .cta-nav {
            background: #2196F3;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            position: absolute;
            right: 5%;
        }

        .cta-nav:hover {
            background: #1976D2;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            position: absolute;
            right: 5%;
        }

        /* ===== HERO SECTION ===== */
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
            transition: all 0.3s;
        }

        .hero p {
            font-size: 1.3rem;
            max-width: 800px;
            margin-bottom: 30px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
            transition: all 0.3s;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 40px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .cta-button:hover {
            background: #1976D2;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        /* ===== TEMPLATES SECTION ===== */
        .templates-section {
            position: relative;
            padding: 80px 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            margin-top: -100px;
            z-index: 10;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
        }

        .templates-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .template-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .template-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .template-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.3s;
        }

        .template-info {
            padding: 20px;
        }

        .template-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: #333;
            transition: all 0.3s;
        }

        .template-category {
            display: inline-block;
            background: #e3f2fd;
            color: #2196F3;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-bottom: 15px;
            transition: all 0.3s;
        }

        .template-desc {
            color: #666;
            margin-bottom: 15px;
            transition: all 0.3s;
        }

        .template-btn {
            display: inline-block;
            padding: 8px 20px;
            background: #f5f5f5;
            color: #333;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .template-btn:hover {
            background: #2196F3;
            color: white;
        }

        .template-btn-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* ===== CONTENT SECTIONS ===== */
        section {
            padding: 100px 20px;
            background: white;
        }

        .section-dark {
            background: #f9f9f9;
        }

        .content-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #333;
            text-align: center;
            transition: all 0.3s;
        }

        /* ===== FEATURES SECTION ===== */
        .features-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            text-align: center;
            transition: all 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #2196F3;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .feature-title {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #333;
            transition: all 0.3s;
        }

        .feature-desc {
            color: #666;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        /* ===== TESTIMONIALS SECTION ===== */
        .testimonials-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .testimonial-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            position: relative;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: #555;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .testimonial-author {
            font-weight: 600;
            color: #333;
            transition: all 0.3s;
        }

        .testimonial-role {
            color: #777;
            font-size: 0.9rem;
            margin-top: 5px;
            transition: all 0.3s;
        }

        .delete-testimonial-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(244, 67, 54, 0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .testimonial-card:hover .delete-testimonial-btn {
            opacity: 1;
        }

        /* ===== GALLERY SECTION ===== */
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .gallery-info {
            padding: 15px;
        }

        .gallery-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .gallery-desc {
            color: #666;
            font-size: 0.9rem;
        }

        .delete-gallery-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(244, 67, 54, 0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gallery-item:hover .delete-gallery-btn {
            opacity: 1;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            text-align: center;
            padding: 80px 20px;
            background: #2196F3;
            color: white;
        }

        .cta-section h2 {
            color: white;
            margin-bottom: 20px;
        }

        .cta-section p {
            max-width: 700px;
            margin: 0 auto 30px;
            font-size: 1.1rem;
        }

        /* ===== CONTACT SECTION ===== */
        .contact-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .contact-info {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .contact-info h3 {
            margin-bottom: 15px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-info p {
            color: #666;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-info i {
            color: #2196F3;
            width: 20px;
            text-align: center;
        }

        .contact-form {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }

        .contact-form textarea {
            height: 120px;
        }

        /* ===== FOOTER ===== */
        footer {
            background: #0e0d0d;
            color: white;
            padding: 60px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: #2196F3;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 10px;
        }

        .footer-column a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: #2196F3;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid #333;
            max-width: 1200px;
            margin: 30px auto 0;
        }

        .copyright {
            color: #bbb;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .publish-btn {
            margin-top: 20px;
            padding: 12px 30px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .publish-btn:hover {
            background: #1976D2;
            transform: translateY(-3px);
        }

        /* ===== IMAGE UPLOAD ===== */
        .image-upload-container {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        /* ===== VIDEO UPLOAD ===== */
        .video-upload-container {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        /* ===== BACKGROUND OPTIONS ===== */
        .background-options {
            margin-bottom: 20px;
        }

        .background-option-btn {
            padding: 8px 15px;
            margin-right: 10px;
            background: #f5f5f5;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .background-option-btn.active {
            background: #2196F3;
            color: white;
        }

        /* ===== DOWNLOAD BUTTON ===== */
        .download-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            cursor: pointer;
            z-index: 100;
            transition: all 0.3s;
        }

        .download-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            background-color: #128C7E;
        }

        .download-btn i {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* ===== PREVIEW MODE ===== */
        body.preview-mode .admin-btn,
        body.preview-mode .admin-panel {
            display: none !important;
        }

        /* ===== PRICING SECTION ===== */
        .pricing-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .pricing-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
            text-align: center;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .pricing-card.featured {
            border: 2px solid #2196F3;
            position: relative;
        }

        .pricing-card.featured::before {
            content: 'Popular';
            position: absolute;
            top: -10px;
            right: 20px;
            background: #2196F3;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .pricing-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .pricing-price {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2196F3;
        }

        .pricing-price span {
            font-size: 1rem;
            color: #666;
        }

        .pricing-features {
            list-style: none;
            margin-bottom: 30px;
        }

        .pricing-features li {
            margin-bottom: 10px;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .pricing-features li i {
            color: #4CAF50;
        }

        .pricing-btn {
            display: inline-block;
            padding: 12px 30px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
        }

        .pricing-btn:hover {
            background: #1976D2;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        /* ===== ABOUT SECTION ===== */
        .about-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 50px;
            margin-top: 50px;
        }

        .about-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .about-content h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        .about-content p {
            margin-bottom: 15px;
            color: #666;
            line-height: 1.6;
        }

        /* ===== RESOURCES SECTION ===== */
        .resources-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .resource-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .resource-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .resource-info {
            padding: 20px;
        }

        .resource-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
        }

        .resource-desc {
            color: #666;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .resource-link {
            display: inline-block;
            color: #2196F3;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
        }

        .resource-link:hover {
            color: #1976D2;
            text-decoration: underline;
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 1024px) {
            .navbar {
                justify-content: space-between;
            }
            
            .nav-links {
                position: fixed;
                top: 70px;
                left: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.9);
                flex-direction: column;
                align-items: center;
                padding: 20px 0;
                display: none;
            }
            
            .nav-links.show {
                display: flex;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .logo {
                position: static;
            }
            
            .cta-nav {
                position: static;
                margin-top: 15px;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .admin-panel {
                width: 90%;
                right: 5%;
            }
            
            .social-icons {
                left: 10px;
                gap: 10px;
            }
            
            .social-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
            
            .templates-section {
                margin-top: -50px;
                padding: 50px 20px;
            }
            
            .download-btn {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                font-size: 20px;
            }

            /* Adjust admin button position on mobile */
            .admin-btn {
                right: 80px;
                padding: 10px 15px;
                font-size: 0;
            }

            .admin-btn i {
                font-size: 16px;
                margin-right: 0;
            }

            /* Adjust logo to prevent overlap */
            .logo {
                max-width: 120px;
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }

            .logo-img {
                height: 25px;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 18px;
            }

            .admin-btn {
                right: 60px;
                width: 40px;
                height: 40px;
                padding: 0;
                border-radius: 50%;
                justify-content: center;
            }

            .logo-text {
                display: none;
            }

            .logo-img {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- ===== ADMIN PANEL & THEME SWITCHER ===== -->
    <button class="admin-btn" id="admin-toggle">
        <i class="fas fa-cog"></i> <span class="admin-btn-text">Admin</span>
    </button>
    
    <div class="admin-panel" id="admin-panel">
        <h3 style="margin-bottom: 20px;">Website Editor</h3>
        
        <!-- Search Bar -->
        <input type="text" class="admin-search" id="admin-search" placeholder="Search for settings...">
        
        <!-- Logo Upload -->
        <div class="form-group">
            <label>Website Logo</label>
            <div class="image-upload-container">
                <input type="file" id="logo-file-upload" accept="image/*" style="display: none;">
                <button onclick="document.getElementById('logo-file-upload').click()" class="btn btn-primary">
                    <i class="fas fa-upload"></i> Upload Logo
                </button>
                <input type="text" id="logo-url" class="form-control" placeholder="Or enter logo URL">
                <button onclick="updateLogo()" class="btn">
                    <i class="fas fa-link"></i> Apply
                </button>
            </div>
        </div>
        
        <!-- Background Options -->
        <div class="background-options">
            <label>Background Type</label>
            <div style="margin-top: 10px;">
                <button class="background-option-btn" onclick="setBackgroundType('video')">Video</button>
                <button class="background-option-btn active" onclick="setBackgroundType('image')">Image</button>
                <button class="background-option-btn" onclick="setBackgroundType('color')">Color</button>
            </div>
        </div>
        
        <!-- Video Settings -->
        <div class="form-group" id="video-settings" style="display: none;">
            <label>Background Video</label>
            <div class="video-upload-container">
                <input type="file" id="video-file-upload" accept="video/*" style="display: none;">
                <button onclick="document.getElementById('video-file-upload').click()" class="btn btn-primary">
                    <i class="fas fa-upload"></i> Upload Video
                </button>
                <input type="text" id="video-url" class="form-control" placeholder="Or enter video URL" value="https://assets.mixkit.co/videos/preview/mixkit-tree-with-yellow-flowers-1173-large.mp4">
                <button onclick="updateVideoSource()" class="btn">
                    <i class="fas fa-link"></i> Apply
                </button>
            </div>
        </div>
        
        <!-- Image Settings -->
        <div class="form-group" id="image-settings">
            <label>Background Image</label>
            <div class="image-upload-container">
                <input type="file" id="image-file-upload" accept="image/*" style="display: none;">
                <button onclick="document.getElementById('image-file-upload').click()" class="btn btn-primary">
                    <i class="fas fa-upload"></i> Upload Image
                </button>
                <input type="text" id="image-url" class="form-control" placeholder="Or enter image URL">
                <button onclick="updateImageSource()" class="btn">
                    <i class="fas fa-link"></i> Apply
                </button>
            </div>
        </div>
        
        <!-- Color Settings -->
        <div class="form-group" id="color-settings" style="display: none;">
            <label>Background Color</label>
            <input type="color" id="bg-color-picker" class="form-control" value="#000000" style="height: 40px;">
            <button onclick="applyBackgroundColor()" class="btn" style="margin-top: 10px;">
                Apply Color
            </button>
        </div>
        
        <!-- Business Info -->
        <div class="form-group">
            <label for="business-name">Business Name</label>
            <input type="text" id="business-name" class="form-control" value="KoliBusiness">
        </div>
        
        <div class="form-group">
            <label for="business-slogan">Business Slogan</label>
            <input type="text" id="business-slogan" class="form-control" value="Empowering everyone to create beautiful websites">
        </div>
        
        <!-- WhatsApp Number -->
        <div class="form-group">
            <label for="whatsapp-number">WhatsApp Number (with country code)</label>
            <input type="text" id="whatsapp-number" class="form-control" placeholder="e.g. +919876543210">
        </div>
        
        <!-- Social Media Links -->
        <div class="form-group">
            <label>Social Media Links</label>
            <div id="social-media-editor" style="margin-bottom: 10px;"></div>
            <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                <select id="new-social-platform" class="form-control" style="flex: 1;">
                    <option value="facebook">Facebook</option>
                    <option value="instagram">Instagram</option>
                    <option value="twitter">Twitter</option>
                    <option value="linkedin">LinkedIn</option>
                    <option value="youtube">YouTube</option>
                    <option value="whatsapp">WhatsApp</option>
                </select>
                <input type="text" id="new-social-url" class="form-control" placeholder="Profile URL" style="flex: 3;">
                <button onclick="addSocialLink()" class="btn">
                    <i class="fas fa-plus"></i> Add
                </button>
            </div>
        </div>
        
        <!-- Navigation Links -->
        <div class="form-group">
            <label>Navigation Links</label>
            <div id="nav-links-editor" style="margin-bottom: 10px;"></div>
            <div style="display: flex; gap: 10px;">
                <input type="text" id="new-nav-text" class="form-control" placeholder="Link Text" style="flex: 2;">
                <input type="text" id="new-nav-url" class="form-control" placeholder="Link URL" style="flex: 3;">
                <button onclick="addNavLink()" class="btn">
                    <i class="fas fa-plus"></i> Add
                </button>
            </div>
        </div>
        
        <!-- Hero Section -->
        <div class="form-group">
            <label for="hero-title">Hero Title</label>
            <input type="text" id="hero-title-text" class="form-control" value="Build Your Dream Website For Free">
        </div>
        
        <div class="form-group">
            <label for="hero-subtitle">Hero Subtitle</label>
            <textarea id="hero-subtitle-text" class="form-control" rows="3">Koli Business empowers you to create stunning, professional websites with our intuitive drag-and-drop builder. No technical skills required.</textarea>
        </div>
        
        <div class="form-group">
            <label for="hero-button-text">Hero Button Text</label>
            <input type="text" id="hero-button-text" class="form-control" value="Make Your Website">
        </div>
        
        <!-- Section Headings -->
        <div class="form-group">
            <label for="templates-heading">Templates Section Heading</label>
            <input type="text" id="templates-heading" class="form-control" value="Stunning Templates for Every Need">
        </div>
        
        <div class="form-group">
            <label for="features-heading">Features Section Heading</label>
            <input type="text" id="features-heading" class="form-control" value="Everything You Need to Succeed Online">
        </div>
        
        <div class="form-group">
            <label for="pricing-heading">Pricing Section Heading</label>
            <input type="text" id="pricing-heading" class="form-control" value="Simple, Transparent Pricing">
        </div>
        
        <div class="form-group">
            <label for="about-heading">About Section Heading</label>
            <input type="text" id="about-heading" class="form-control" value="About Our Company">
        </div>
        
        <div class="form-group">
            <label for="resources-heading">Resources Section Heading</label>
            <input type="text" id="resources-heading" class="form-control" value="Helpful Resources">
        </div>
        
        <div class="form-group">
            <label for="gallery-heading">Gallery Section Heading</label>
            <input type="text" id="gallery-heading" class="form-control" value="Our Gallery">
        </div>
        
        <div class="form-group">
            <label for="testimonials-heading">Testimonials Section Heading</label>
            <input type="text" id="testimonials-heading" class="form-control" value="What Our Customers Say">
        </div>
        
        <div class="form-group">
            <label for="contact-heading">Contact Section Heading</label>
            <input type="text" id="contact-heading" class="form-control" value="Contact Us">
        </div>
        
        <div class="form-group">
            <label for="cta-heading">CTA Section Heading</label>
            <input type="text" id="cta-heading" class="form-control" value="Ready to Build Your Website for Free?">
        </div>
        
        <!-- Features Section -->
        <div class="form-group">
            <label>Features</label>
            <div id="features-editor" style="margin-bottom: 10px;"></div>
            <div style="border: 1px dashed #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                <div class="form-group">
                    <label>New Feature Icon (Font Awesome class)</label>
                    <input type="text" id="new-feature-icon" class="form-control" placeholder="fas fa-icon">
                </div>
                <div class="form-group">
                    <label>New Feature Title</label>
                    <input type="text" id="new-feature-title" class="form-control" placeholder="Feature Title">
                </div>
                <div class="form-group">
                    <label>New Feature Description</label>
                    <textarea id="new-feature-desc" class="form-control" rows="2" placeholder="Feature Description"></textarea>
                </div>
                <button onclick="addFeature()" class="btn">
                    <i class="fas fa-plus"></i> Add Feature
                </button>
            </div>
        </div>
        
        <!-- Templates Section -->
        <div class="form-group">
            <label>Templates</label>
            <div id="templates-editor" style="margin-bottom: 10px;"></div>
            <div style="border: 1px dashed #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                <div class="form-group">
                    <label>New Template Image URL</label>
                    <input type="text" id="new-template-img" class="form-control" placeholder="Image URL">
                </div>
                <div class="form-group">
                    <label>New Template Title</label>
                    <input type="text" id="new-template-title" class="form-control" placeholder="Template Title">
                </div>
                <div class="form-group">
                    <label>New Template Category</label>
                    <input type="text" id="new-template-category" class="form-control" placeholder="Template Category">
                </div>
                <div class="form-group">
                    <label>New Template Description</label>
                    <textarea id="new-template-desc" class="form-control" rows="2" placeholder="Template Description"></textarea>
                </div>
                <div class="form-group">
                    <label>Template Buttons (comma separated)</label>
                    <input type="text" id="new-template-buttons" class="form-control" placeholder="View Demo, Get Started">
                </div>
                <button onclick="addTemplate()" class="btn">
                    <i class="fas fa-plus"></i> Add Template
                </button>
            </div>
        </div>
        
        <!-- Pricing Section -->
        <div class="form-group">
            <label>Pricing Plans</label>
            <div id="pricing-editor" style="margin-bottom: 10px;"></div>
            <div style="border: 1px dashed #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                <div class="form-group">
                    <label>Plan Title</label>
                    <input type="text" id="new-pricing-title" class="form-control" placeholder="Basic, Pro, etc.">
                </div>
                <div class="form-group">
                    <label>Plan Price</label>
                    <input type="text" id="new-pricing-price" class="form-control" placeholder="e.g. $9.99/month">
                </div>
                <div class="form-group">
                    <label>Plan Features (one per line)</label>
                    <textarea id="new-pricing-features" class="form-control" rows="4" placeholder="Feature 1\nFeature 2\nFeature 3"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="new-pricing-featured"> Featured Plan
                    </label>
                </div>
                <button onclick="addPricingPlan()" class="btn">
                    <i class="fas fa-plus"></i> Add Plan
                </button>
            </div>
        </div>
        
        <!-- About Section -->
        <div class="form-group">
            <label>About Section</label>
            <div class="form-group">
                <label>About Title</label>
                <input type="text" id="about-title" class="form-control" value="About Our Company">
            </div>
            <div class="form-group">
                <label>About Image URL</label>
                <input type="text" id="about-image" class="form-control" value="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg">
            </div>
            <div class="form-group">
                <label>About Content</label>
                <textarea id="about-content" class="form-control" rows="6">Koli Business was founded in 2025 with the mission to democratize website creation. Our platform empowers individuals and businesses of all sizes to create professional, beautiful websites without any coding knowledge.

With our intuitive drag-and-drop builder, extensive template library, and powerful features, you can bring your online vision to life in minutes. Our team of designers and developers work tirelessly to ensure you have the best tools at your fingertips.

We believe everyone deserves a high-quality online presence, and we're committed to making that possible for you.</textarea>
            </div>
        </div>
        
        <!-- Resources Section -->
        <div class="form-group">
            <label>Resources Section</label>
            <div class="form-group">
                <label>Resources Title</label>
                <input type="text" id="resources-title" class="form-control" value="Helpful Resources">
            </div>
            <div id="resources-editor" style="margin-bottom: 10px;"></div>
            <div style="border: 1px dashed #ddd; padding: 15px; border-radius: 5px; margin-bottom: 15px;">
                <div class="form-group">
                    <label>Resource Title</label>
                    <input type="text" id="new-resource-title" class="form-control" placeholder="Resource Title">
                </div>
                <div class="form-group">
                    <label>Resource Image URL</label>
                    <input type="text" id="new-resource-image" class="form-control" placeholder="Image URL">
                </div>
                <div class="form-group">
                    <label>Resource Description</label>
                    <textarea id="new-resource-desc" class="form-control" rows="2" placeholder="Resource Description"></textarea>
                </div>
                <div class="form-group">
                    <label>Resource Link URL</label>
                    <input type="text" id="new-resource-url" class="form-control" placeholder="Link URL">
                </div>
                <button onclick="addResource()" class="btn">
                    <i class="fas fa-plus"></i> Add Resource
                </button>
            </div>
        </div>
        
        <!-- Testimonials Section -->
        <div class="form-group">
            <label>Testimonials</label>
            <div id="testimonials-editor" style="margin-bottom: 10px;"></div>
            <div style="border: 1px dashed #ddd; padding: 15px; border-radius: 5px;">
                <div class="form-group">
                    <label for="testimonial-text">Testimonial Text</label>
                    <textarea id="testimonial-text" class="form-control" rows="3" placeholder="Enter testimonial text"></textarea>
                </div>
                <div class="form-group">
                    <label for="testimonial-author">Author Name</label>
                    <input type="text" id="testimonial-author" class="form-control" placeholder="Enter author name">
                </div>
                <div class="form-group">
                    <label for="testimonial-role">Author Role</label>
                    <input type="text" id="testimonial-role" class="form-control" placeholder="Enter author role">
                </div>
                <button onclick="addTestimonial()" class="btn">
                    <i class="fas fa-plus"></i> Add Testimonial
                </button>
            </div>
        </div>
        
        <!-- Gallery Section -->
        <div class="form-group">
            <label>Gallery Images</label>
            <div class="image-upload-container">
                <input type="file" id="gallery-file-upload" accept="image/*" style="display: none;">
                <button onclick="document.getElementById('gallery-file-upload').click()" class="btn btn-primary">
                    <i class="fas fa-upload"></i> Upload Image
                </button>
                <input type="text" id="gallery-image-url" class="form-control" placeholder="Or enter image URL">
                <button onclick="addGalleryImageFromUrl()" class="btn">
                    <i class="fas fa-link"></i> Add URL
                </button>
            </div>
            
            <div class="form-group" style="margin-top: 15px;">
                <label for="gallery-image-title">Image Title</label>
                <input type="text" id="gallery-image-title" class="form-control" placeholder="Enter image title">
            </div>
            
            <div class="form-group">
                <label for="gallery-image-description">Image Description</label>
                <textarea id="gallery-image-description" class="form-control" rows="3" placeholder="Enter image description"></textarea>
            </div>
            
            <div id="gallery-images-container" style="margin-top: 15px;"></div>
        </div>
        
        <!-- Contact Information Section -->
        <div class="form-group">
            <label>Contact Information</label>
            <div class="form-group">
                <label>Address</label>
                <input type="text" id="contact-address" class="form-control" value="123 Business Street, City">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" id="contact-phone" class="form-control" value="+1 (123) 456-7890">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="contact-email" class="form-control" value="info@kolibusiness.com">
            </div>
            <div class="form-group">
                <label>Working Hours</label>
                <input type="text" id="contact-hours" class="form-control" value="Monday-Friday: 9:00 AM - 5:00 PM">
            </div>
        </div>
        
        <!-- Footer Section -->
        <div class="form-group">
            <label for="copyright-text">Copyright Text</label>
            <input type="text" id="copyright-text" class="form-control" value="© 2025 KoliBusiness. All rights reserved.">
        </div>
        
        <button onclick="saveChanges()" class="btn" style="width: 100%; margin-top: 10px;">
            <i class="fas fa-save"></i> Save All Changes
        </button>
        
        <button onclick="previewWebsite()" class="btn" style="width: 100%; margin-top: 10px; background-color: #4CAF50;">
            <i class="fas fa-eye"></i> Preview Website
        </button>
    </div>

    <!-- ===== SOCIAL MEDIA ICONS ===== -->
    <div class="social-icons">
        <a href="#" class="social-icon" id="whatsapp-icon"><i class="fab fa-whatsapp"></i></a>
        <a href="#" class="social-icon" id="facebook-icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon" id="instagram-icon"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-icon" id="linkedin-icon"><i class="fab fa-linkedin-in"></i></a>
    </div>

    <!-- ===== WEBSITE CONTENT ===== -->
    <!-- Background Container -->
    <div class="background-container">
        <video autoplay muted loop playsinline id="bg-video">
            <source src="https://assets.mixkit.co/videos/preview/mixkit-tree-with-yellow-flowers-1173-large.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <img src="https://images.pexels.com/photos/13214707/pexels-photo-13214707.jpeg?auto=compress&cs=tinysrgb&w=1200" id="bg-image" alt="Background Image">
        <div class="background-overlay"></div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar" id="navbar">
        <a href="#" class="logo" id="logo">
            <img src="" class="logo-img" id="logo-img" style="display: none;">
            <span class="logo-text">KoliBusiness</span>
        </a>
        <div class="nav-links" id="nav-links">
            <a href="#features">Features</a>
            <a href="#templates">Templates</a>
            <a href="#pricing">Pricing</a>
            <a href="#resources">Resources</a>
            <a href="#about">About</a>
            <a href="#contact" class="cta-nav">Enquiry Now</a>
        </div>
        <button class="mobile-menu-btn" id="mobile-menu-btn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <!-- Hero Section -->
    <header id="home" class="hero">
        <h1 id="hero-title">WELCOME TO KOLI BUSINESS</h1>
        <p id="hero-subtitle">Koli Business empowers you to create stunning, professional websites with our intuitive drag-and-drop builder. No technical skills required.</p>
        <a href="#templates" class="cta-button" id="hero-button">Make Your Website</a>
    </header>

    <!-- Templates Section - Now at the top -->
    <section id="templates" class="section-dark">
        <div class="content-container">
            <h2 id="templates-title">Stunning Templates for Every Need</h2>
            <div class="templates-container" id="templates-container">
                <!-- Template 1 -->
                <div class="template-card">
                    <img src="https://images.pexels.com/photos/39284/macbook-apple-imac-computer-39284.jpeg" class="template-image">
                    <div class="template-info">
                        <h3 class="template-title">Business Website</h3>
                        <span class="template-category">Corporate</span>
                        <p class="template-desc">Professional design perfect for businesses to showcase their services and products.</p>
                        <div class="template-btn-container">
                            <a href="#" class="template-btn">View Demo</a>
                            <a href="#" class="template-btn">Get Started</a>
                        </div>
                    </div>
                </div>
                
                <!-- Template 2 -->
                <div class="template-card">
                    <img src="https://images.pexels.com/photos/461064/pexels-photo-461064.jpeg" class="template-image">
                    <div class="template-info">
                        <h3 class="template-title">Restaurant Template</h3>
                        <span class="template-category">Food & Dining</span>
                        <p class="template-desc">Beautiful designs to showcase your menu, location, and dining experience.</p>
                        <div class="template-btn-container">
                            <a href="#" class="template-btn">View Demo</a>
                            <a href="#" class="template-btn">Order Now</a>
                        </div>
                    </div>
                </div>
                
                <!-- Template 3 -->
                <div class="template-card">
                    <img src="https://images.pexels.com/photos/5632402/pexels-photo-5632402.jpeg" class="template-image">
                    <div class="template-info">
                        <h3 class="template-title">Ecommerce Store</h3>
                        <span class="template-category">Online Shopping</span>
                        <p class="template-desc">Everything you need to start selling products online with beautiful product displays.</p>
                        <div class="template-btn-container">
                            <a href="#" class="template-btn">View Demo</a>
                            <a href="#" class="template-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features">
        <div class="content-container">
            <h2 id="features-title">Everything You Need to Succeed Online</h2>
            <div class="features-container" id="features-container">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mouse-pointer"></i>
                    </div>
                    <h3 class="feature-title">Drag & Drop Builder</h3>
                    <p class="feature-desc">Create beautiful websites with zero coding skills using our intuitive visual editor.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Mobile Optimized</h3>
                    <p class="feature-desc">All websites automatically look perfect on phones, tablets and desktops.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Blazing Fast</h3>
                    <p class="feature-desc">Lightning-fast loading times with our optimized infrastructure.</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="feature-title">SEO Tools</h3>
                    <p class="feature-desc">Built-in SEO features to help you rank higher in search results.</p>
                </div>
                
                <!-- Feature 5 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="feature-title">Ecommerce Ready</h3>
                    <p class="feature-desc">Sell products online with our powerful ecommerce tools.</p>
                </div>
                
                <!-- Feature 6 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="feature-title">24/7 Support</h3>
                    <p class="feature-desc">Our expert team is always available to help you succeed.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="section-dark">
        <div class="content-container">
            <h2 id="pricing-title">Simple, Transparent Pricing</h2>
            <div class="pricing-container" id="pricing-container">
                <!-- Pricing Plan 1 -->
                <div class="pricing-card">
                    <h3 class="pricing-title">Basic</h3>
                    <div class="pricing-price">$9.99 <span>/month</span></div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> 10 Website Pages</li>
                        <li><i class="fas fa-check"></i> 5GB Storage</li>
                        <li><i class="fas fa-check"></i> Basic Templates</li>
                        <li><i class="fas fa-check"></i> Email Support</li>
                    </ul>
                    <a href="#" class="pricing-btn">Get Started</a>
                </div>
                
                <!-- Pricing Plan 2 -->
                <div class="pricing-card featured">
                    <h3 class="pricing-title">Pro</h3>
                    <div class="pricing-price">$19.99 <span>/month</span></div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> 50 Website Pages</li>
                        <li><i class="fas fa-check"></i> 20GB Storage</li>
                        <li><i class="fas fa-check"></i> Premium Templates</li>
                        <li><i class="fas fa-check"></i> Priority Support</li>
                        <li><i class="fas fa-check"></i> Ecommerce Features</li>
                    </ul>
                    <a href="#" class="pricing-btn">Get Started</a>
                </div>
                
                <!-- Pricing Plan 3 -->
                <div class="pricing-card">
                    <h3 class="pricing-title">Enterprise</h3>
                    <div class="pricing-price">$49.99 <span>/month</span></div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Unlimited Pages</li>
                        <li><i class="fas fa-check"></i> 100GB Storage</li>
                        <li><i class="fas fa-check"></i> All Templates</li>
                        <li><i class="fas fa-check"></i> 24/7 Support</li>
                        <li><i class="fas fa-check"></i> Advanced Ecommerce</li>
                        <li><i class="fas fa-check"></i> Custom Domain</li>
                    </ul>
                    <a href="#" class="pricing-btn">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="content-container">
            <h2 id="about-title">About Our Company</h2>
            <div class="about-container">
                <div class="about-image">
                    <img src="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg" alt="Our Team">
                </div>
                <div class="about-content">
                    <h3>Our Story</h3>
                    <p id="about-content-text">Koli Business was founded in 2025 with the mission to democratize website creation. Our platform empowers individuals and businesses of all sizes to create professional, beautiful websites without any coding knowledge.</p>
                    <p>With our intuitive drag-and-drop builder, extensive template library, and powerful features, you can bring your online vision to life in minutes. Our team of designers and developers work tirelessly to ensure you have the best tools at your fingertips.</p>
                    <p>We believe everyone deserves a high-quality online presence, and we're committed to making that possible for you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Resources Section -->
    <section id="resources" class="section-dark">
        <div class="content-container">
            <h2 id="resources-title">Helpful Resources</h2>
            <div class="resources-container" id="resources-container">
                <!-- Resource 1 -->
                <div class="resource-card">
                    <img src="https://images.pexels.com/photos/590016/pexels-photo-590016.jpeg" class="resource-image">
                    <div class="resource-info">
                        <h3 class="resource-title">Getting Started Guide</h3>
                        <p class="resource-desc">Learn how to create your first website with our step-by-step guide.</p>
                        <a href="#" class="resource-link">Read Guide →</a>
                    </div>
                </div>
                
                <!-- Resource 2 -->
                <div class="resource-card">
                    <img src="https://images.pexels.com/photos/669615/pexels-photo-669615.jpeg" class="resource-image">
                    <div class="resource-info">
                        <h3 class="resource-title">Video Tutorials</h3>
                        <p class="resource-desc">Watch our video tutorials to master all features of Koli Business.</p>
                        <a href="#" class="resource-link">Watch Videos →</a>
                    </div>
                </div>
                
                <!-- Resource 3 -->
                <div class="resource-card">
                    <img src="https://images.pexels.com/photos/1181271/pexels-photo-1181271.jpeg" class="resource-image">
                    <div class="resource-info">
                        <h3 class="resource-title">FAQ Center</h3>
                        <p class="resource-desc">Find answers to frequently asked questions about our platform.</p>
                        <a href="#" class="resource-link">View FAQs →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section-dark">
        <div class="content-container">
            <h2 id="gallery-title">Our Gallery</h2>
            <div class="gallery-container" id="gallery-container">
                <!-- Gallery items will be added here dynamically -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials">
        <div class="content-container">
            <h2 id="testimonials-title">What Our Customers Say</h2>
            <div class="testimonials-container" id="testimonials-container">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">"Koli Business made it so easy to create my business website. I had zero technical skills but built a professional site in just a few hours!"</div>
                    <div class="testimonial-author">Sarah Johnson</div>
                    <div class="testimonial-role">Small Business Owner</div>
                    <button class="delete-testimonial-btn" onclick="removeTestimonial(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">"The templates are gorgeous and the editor is incredibly intuitive. By far the best website builder I've used!"</div>
                    <div class="testimonial-author">Michael Chen</div>
                    <div class="testimonial-role">Freelance Designer</div>
                    <button class="delete-testimonial-btn" onclick="removeTestimonial(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <div class="testimonial-text">"Our online sales increased by 200% after switching to Koli Business. The ecommerce tools are amazing."</div>
                    <div class="testimonial-author">Emily Rodriguez</div>
                    <div class="testimonial-role">Ecommerce Entrepreneur</div>
                    <button class="delete-testimonial-btn" onclick="removeTestimonial(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-dark">
        <div class="content-container">
            <h2 id="contact-title">Contact Us</h2>
            <div class="contact-container">
                <div class="contact-info">
                    <h3><i class="fas fa-map-marker-alt"></i> Our Location</h3>
                    <p id="contact-address-text">123 Business Street, City</p>
                    
                    <h3><i class="fas fa-phone"></i> Phone</h3>
                    <p id="contact-phone-text">+1 (123) 456-7890</p>
                    
                    <h3><i class="fas fa-envelope"></i> Email</h3>
                    <p id="contact-email-text">info@kolibusiness.com</p>
                    
                    <h3><i class="fas fa-clock"></i> Working Hours</h3>
                    <p id="contact-hours-text">Monday-Friday: 9:00 AM - 5:00 PM</p>
                </div>
                
                <div class="contact-form">
                    <h3><i class="fas fa-paper-plane"></i> Send Us a Message</h3>
                    <form id="message-form">
                        <div class="form-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="cta-section">
        <div class="content-container">
            <h2 id="cta-title">Ready to Build Your Website for Free?</h2>
            <p id="cta-text">Join millions of creators and businesses who trust Koli Business for their online presence.</p>
            <a href="#templates" class="cta-button" id="cta-button">Start Building Free</a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-content">
            <div class="footer-column">
                <h3 id="footer-col1-title">Koli Business</h3>
                <p id="footer-col1-desc">Empowering everyone to create beautiful websites without coding.</p>
            </div>
            
            <div class="footer-column">
                <h3>Product</h3>
                <ul id="footer-product-links">
                    <li><a href="#features">Features</a></li>
                    <li><a href="#templates">Templates</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#integrations">Integrations</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Resources</h3>
                <ul id="footer-resources-links">
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#help">Help Center</a></li>
                    <li><a href="#tutorials">Tutorials</a></li>
                    <li><a href="#webinars">Webinars</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Company</h3>
                <ul id="footer-company-links">
                    <li><a href="#about">About</a></li>
                    <li><a href="#careers">Careers</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#press">Press</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="copyright" id="copyright-text">© 2025 KoliBusiness. All rights reserved.</p>
            <button class="publish-btn" id="publish-btn" onclick="downloadWebsite()">
                <i class="fas fa-download"></i> Download Site
            </button>
        </div>
    </footer>

    <!-- Download Button -->
    <div class="download-btn" onclick="downloadWebsite()">
        <i class="fas fa-download"></i>
    </div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // Initialize Admin Panel
        document.addEventListener('DOMContentLoaded', function() {
            // Show image background by default
            document.getElementById('bg-image').style.display = 'block';
            
            // Toggle Admin Panel
            document.getElementById('admin-toggle').addEventListener('click', function() {
                document.getElementById('admin-panel').classList.toggle('show');
            });
            
            // Toggle Mobile Menu
            document.getElementById('mobile-menu-btn').addEventListener('click', function() {
                document.getElementById('nav-links').classList.toggle('show');
            });
            
            // Set up logo upload
            document.getElementById('logo-file-upload').addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        const logoImg = document.getElementById('logo-img');
                        logoImg.src = event.target.result;
                        logoImg.style.display = 'block';
                        document.querySelector('.logo-text').style.display = 'none';
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
            
            // Set up video upload
            document.getElementById('video-file-upload').addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const videoUrl = URL.createObjectURL(file);
                    document.getElementById('bg-video').src = videoUrl;
                    document.getElementById('bg-video').load();
                }
            });
            
            // Set up image upload
            document.getElementById('image-file-upload').addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        document.getElementById('bg-image').src = event.target.result;
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
            
            // Set up gallery image upload
            document.getElementById('gallery-file-upload').addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(event) {
                        const title = document.getElementById('gallery-image-title').value || file.name;
                        const description = document.getElementById('gallery-image-description').value || '';
                        addGalleryImage(event.target.result, title, description);
                        
                        // Clear input fields
                        document.getElementById('gallery-image-title').value = '';
                        document.getElementById('gallery-image-description').value = '';
                    };
                    
                    reader.readAsDataURL(file);
                }
            });
            
            // Initialize all editors
            setupNavLinksEditor();
            setupFeaturesEditor();
            setupTemplatesEditor();
            setupPricingEditor();
            setupTestimonialsEditor();
            setupGalleryEditor();
            setupSocialMediaEditor();
            
            // Add some default gallery images
            addDefaultGalleryImages();
            
            // Update WhatsApp link when number changes
            document.getElementById('whatsapp-number').addEventListener('input', updateWhatsAppLink);
            
            // Set up search functionality
            document.getElementById('admin-search').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const formGroups = document.querySelectorAll('.admin-panel .form-group');
                
                formGroups.forEach(group => {
                    const label = group.querySelector('label');
                    if (label) {
                        const text = label.textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            group.style.display = 'block';
                        } else {
                            group.style.display = 'none';
                        }
                    }
                });
            });

            // Smooth scrolling for all links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        // Update Logo
        function updateLogo() {
            const logoUrl = document.getElementById('logo-url').value.trim();
            if (logoUrl) {
                const logoImg = document.getElementById('logo-img');
                logoImg.src = logoUrl;
                logoImg.style.display = 'block';
                document.querySelector('.logo-text').style.display = 'none';
                document.getElementById('logo-url').value = '';
            }
        }

        // Set background type (video/image/color)
        function setBackgroundType(type) {
            const videoSettings = document.getElementById('video-settings');
            const imageSettings = document.getElementById('image-settings');
            const colorSettings = document.getElementById('color-settings');
            const bgVideo = document.getElementById('bg-video');
            const bgImage = document.getElementById('bg-image');
            
            // Reset all buttons
            document.querySelectorAll('.background-option-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Activate clicked button
            event.target.classList.add('active');
            
            if (type === 'video') {
                videoSettings.style.display = 'block';
                imageSettings.style.display = 'none';
                colorSettings.style.display = 'none';
                
                bgVideo.style.display = 'block';
                bgImage.style.display = 'none';
                document.querySelector('.background-overlay').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
            } 
            else if (type === 'image') {
                videoSettings.style.display = 'none';
                imageSettings.style.display = 'block';
                colorSettings.style.display = 'none';
                
                bgVideo.style.display = 'none';
                bgImage.style.display = 'block';
                document.querySelector('.background-overlay').style.backgroundColor = 'rgba(0, 0, 0, 0.4)';
            } 
            else if (type === 'color') {
                videoSettings.style.display = 'none';
                imageSettings.style.display = 'none';
                colorSettings.style.display = 'block';
                
                bgVideo.style.display = 'none';
                bgImage.style.display = 'none';
            }
        }

        // Apply background color
        function applyBackgroundColor() {
            const color = document.getElementById('bg-color-picker').value;
            document.querySelector('.background-overlay').style.backgroundColor = color;
        }

        // Update Video Source
        function updateVideoSource() {
            const videoUrl = document.getElementById('video-url').value.trim();
            if (videoUrl) {
                document.getElementById('bg-video').src = videoUrl;
                document.getElementById('bg-video').load();
                document.getElementById('video-url').value = '';
            }
        }

        // Update Image Source
        function updateImageSource() {
            const imageUrl = document.getElementById('image-url').value.trim();
            if (imageUrl) {
                document.getElementById('bg-image').src = imageUrl;
                document.getElementById('image-url').value = '';
            }
        }

        // Update WhatsApp link
        function updateWhatsAppLink() {
            const number = document.getElementById('whatsapp-number').value.trim();
            const whatsappIcon = document.getElementById('whatsapp-icon');
            
            if (number) {
                whatsappIcon.href = `https://wa.me/${number}`;
            } else {
                whatsappIcon.href = '#';
            }
        }

        // Set Up Social Media Editor
        function setupSocialMediaEditor() {
            const socialIcons = document.querySelectorAll('.social-icons a');
            const editor = document.getElementById('social-media-editor');
            editor.innerHTML = '';
            
            socialIcons.forEach((icon, index) => {
                const platform = icon.id.replace('-icon', '');
                const url = icon.href;
                
                const iconEditor = document.createElement('div');
                iconEditor.style.display = 'flex';
                iconEditor.style.gap = '10px';
                iconEditor.style.marginBottom = '10px';
                
                iconEditor.innerHTML = `
                    <select class="form-control social-platform" style="flex: 1;">
                        <option value="facebook" ${platform === 'facebook' ? 'selected' : ''}>Facebook</option>
                        <option value="instagram" ${platform === 'instagram' ? 'selected' : ''}>Instagram</option>
                        <option value="twitter" ${platform === 'twitter' ? 'selected' : ''}>Twitter</option>
                        <option value="linkedin" ${platform === 'linkedin' ? 'selected' : ''}>LinkedIn</option>
                        <option value="youtube" ${platform === 'youtube' ? 'selected' : ''}>YouTube</option>
                        <option value="whatsapp" ${platform === 'whatsapp' ? 'selected' : ''}>WhatsApp</option>
                    </select>
                    <input type="text" value="${url}" class="form-control social-url" style="flex: 3;">
                    <button onclick="removeSocialLink(${index})" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
                
                // Add event listeners to update social link in real-time
                iconEditor.querySelector('.social-platform').addEventListener('change', function() {
                    const icons = document.querySelectorAll('.social-icon i');
                    if (icons[index]) {
                        const platform = this.value;
                        let iconClass;
                        
                        switch(platform) {
                            case 'facebook': iconClass = 'fab fa-facebook-f'; break;
                            case 'instagram': iconClass = 'fab fa-instagram'; break;
                            case 'twitter': iconClass = 'fab fa-twitter'; break;
                            case 'linkedin': iconClass = 'fab fa-linkedin-in'; break;
                            case 'youtube': iconClass = 'fab fa-youtube'; break;
                            case 'whatsapp': iconClass = 'fab fa-whatsapp'; break;
                            default: iconClass = 'fab fa-link';
                        }
                        
                        icons[index].className = iconClass;
                        socialIcons[index].id = `${platform}-icon`;
                    }
                });
                
                iconEditor.querySelector('.social-url').addEventListener('input', function() {
                    socialIcons[index].href = this.value;
                });
                
                editor.appendChild(iconEditor);
            });
        }

        // Add New Social Link
        function addSocialLink() {
            const platform = document.getElementById('new-social-platform').value;
            const url = document.getElementById('new-social-url').value.trim();
            
            if (url) {
                const container = document.querySelector('.social-icons');
                let iconClass;
                
                switch(platform) {
                    case 'facebook': iconClass = 'fab fa-facebook-f'; break;
                    case 'instagram': iconClass = 'fab fa-instagram'; break;
                    case 'twitter': iconClass = 'fab fa-twitter'; break;
                    case 'linkedin': iconClass = 'fab fa-linkedin-in'; break;
                    case 'youtube': iconClass = 'fab fa-youtube'; break;
                    case 'whatsapp': iconClass = 'fab fa-whatsapp'; break;
                    default: iconClass = 'fab fa-link';
                }
                
                const newLink = document.createElement('a');
                newLink.className = 'social-icon';
                newLink.id = `${platform}-icon`;
                newLink.href = url;
                newLink.innerHTML = `<i class="${iconClass}"></i>`;
                
                container.appendChild(newLink);
                
                // Clear inputs
                document.getElementById('new-social-url').value = '';
                
                // Update editor
                setupSocialMediaEditor();
            }
        }

        // Remove Social Link
        function removeSocialLink(index) {
            const socialIcons = document.querySelectorAll('.social-icons a');
            if (socialIcons[index]) {
                socialIcons[index].remove();
                setupSocialMediaEditor();
            }
        }

        // Set Up Navigation Links Editor
        function setupNavLinksEditor() {
            const navLinks = document.querySelectorAll('#nav-links a:not(.cta-nav)');
            const editor = document.getElementById('nav-links-editor');
            editor.innerHTML = '';
            
            navLinks.forEach((link, index) => {
                const linkEditor = document.createElement('div');
                linkEditor.style.display = 'flex';
                linkEditor.style.gap = '10px';
                linkEditor.style.marginBottom = '10px';
                
                linkEditor.innerHTML = `
                    <input type="text" value="${link.textContent}" class="form-control nav-link-text" style="flex: 2;">
                    <input type="text" value="${link.href}" class="form-control nav-link-url" style="flex: 3;">
                    <button onclick="removeNavLink(${index})" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
                
                // Add event listeners to update nav link in real-time
                linkEditor.querySelector('.nav-link-text').addEventListener('input', function() {
                    navLinks[index].textContent = this.value;
                });
                
                linkEditor.querySelector('.nav-link-url').addEventListener('input', function() {
                    navLinks[index].href = this.value;
                });
                
                editor.appendChild(linkEditor);
            });
        }

        // Add New Navigation Link
        function addNavLink() {
            const text = document.getElementById('new-nav-text').value.trim();
            const url = document.getElementById('new-nav-url').value.trim();
            
            if (text && url) {
                const navLinks = document.getElementById('nav-links');
                const newLink = document.createElement('a');
                newLink.href = url;
                newLink.textContent = text;
                
                // Insert before the CTA button
                navLinks.insertBefore(newLink, document.querySelector('.cta-nav'));
                
                // Clear inputs
                document.getElementById('new-nav-text').value = '';
                document.getElementById('new-nav-url').value = '';
                
                // Update editor
                setupNavLinksEditor();
            }
        }

        // Remove Navigation Link
        function removeNavLink(index) {
            const navLinks = document.getElementById('nav-links');
            const links = document.querySelectorAll('#nav-links a:not(.cta-nav)');
            if (links[index]) {
                navLinks.removeChild(links[index]);
                setupNavLinksEditor();
            }
        }

        // Set Up Features Editor
        function setupFeaturesEditor() {
            const features = document.querySelectorAll('#features-container .feature-card');
            const editor = document.getElementById('features-editor');
            editor.innerHTML = '';
            
            features.forEach((feature, index) => {
                const title = feature.querySelector('.feature-title').textContent;
                const desc = feature.querySelector('.feature-desc').textContent;
                const icon = feature.querySelector('.feature-icon i').className;
                
                const featureEditor = document.createElement('div');
                featureEditor.style.border = '1px solid #eee';
                featureEditor.style.borderRadius = '5px';
                featureEditor.style.padding = '10px';
                featureEditor.style.marginBottom = '10px';
                
                featureEditor.innerHTML = `
                    <div class="form-group">
                        <label>Feature Icon (Font Awesome class)</label>
                        <input type="text" value="${icon}" class="form-control feature-icon-input">
                    </div>
                    <div class="form-group">
                        <label>Feature Title</label>
                        <input type="text" value="${title}" class="form-control feature-title-input">
                    </div>
                    <div class="form-group">
                        <label>Feature Description</label>
                        <textarea class="form-control feature-desc-input" rows="2">${desc}</textarea>
                    </div>
                    <button onclick="removeFeature(${index})" class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-trash"></i> Delete Feature
                    </button>
                `;
                
                // Add event listeners to update feature in real-time
                featureEditor.querySelector('.feature-icon-input').addEventListener('input', function() {
                    const icons = document.querySelectorAll('.feature-icon i');
                    if (icons[index]) {
                        icons[index].className = this.value;
                    }
                });
                
                featureEditor.querySelector('.feature-title-input').addEventListener('input', function() {
                    const titles = document.querySelectorAll('.feature-title');
                    if (titles[index]) {
                        titles[index].textContent = this.value;
                    }
                });
                
                featureEditor.querySelector('.feature-desc-input').addEventListener('input', function() {
                    const descs = document.querySelectorAll('.feature-desc');
                    if (descs[index]) {
                        descs[index].textContent = this.value;
                    }
                });
                
                editor.appendChild(featureEditor);
            });
        }

        // Add New Feature
        function addFeature() {
            const icon = document.getElementById('new-feature-icon').value.trim();
            const title = document.getElementById('new-feature-title').value.trim();
            const desc = document.getElementById('new-feature-desc').value.trim();
            
            if (icon && title && desc) {
                const container = document.getElementById('features-container');
                
                const feature = document.createElement('div');
                feature.className = 'feature-card';
                
                feature.innerHTML = `
                    <div class="feature-icon">
                        <i class="${icon}"></i>
                    </div>
                    <h3 class="feature-title">${title}</h3>
                    <p class="feature-desc">${desc}</p>
                `;
                
                container.appendChild(feature);
                
                // Clear inputs
                document.getElementById('new-feature-icon').value = '';
                document.getElementById('new-feature-title').value = '';
                document.getElementById('new-feature-desc').value = '';
                
                // Update editor
                setupFeaturesEditor();
            }
        }

        // Remove Feature
        function removeFeature(index) {
            const features = document.querySelectorAll('#features-container .feature-card');
            if (features[index]) {
                features[index].remove();
                setupFeaturesEditor();
            }
        }

        // Set Up Templates Editor
        function setupTemplatesEditor() {
            const templates = document.querySelectorAll('#templates-container .template-card');
            const editor = document.getElementById('templates-editor');
            editor.innerHTML = '';
            
            templates.forEach((template, index) => {
                const title = template.querySelector('.template-title').textContent;
                const category = template.querySelector('.template-category').textContent;
                const desc = template.querySelector('.template-desc').textContent;
                const imgSrc = template.querySelector('.template-image').src;
                const buttons = Array.from(template.querySelectorAll('.template-btn')).map(btn => btn.textContent);
                
                const templateEditor = document.createElement('div');
                templateEditor.style.border = '1px solid #eee';
                templateEditor.style.borderRadius = '5px';
                templateEditor.style.padding = '10px';
                templateEditor.style.marginBottom = '10px';
                
                templateEditor.innerHTML = `
                    <div class="form-group">
                        <label>Template Image URL</label>
                        <input type="text" value="${imgSrc}" class="form-control template-img-input">
                    </div>
                    <div class="form-group">
                        <label>Template Title</label>
                        <input type="text" value="${title}" class="form-control template-title-input">
                    </div>
                    <div class="form-group">
                        <label>Template Category</label>
                        <input type="text" value="${category}" class="form-control template-category-input">
                    </div>
                    <div class="form-group">
                        <label>Template Description</label>
                        <textarea class="form-control template-desc-input" rows="2">${desc}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Template Buttons (comma separated)</label>
                        <input type="text" value="${buttons.join(', ')}" class="form-control template-buttons-input">
                    </div>
                    <button onclick="removeTemplate(${index})" class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-trash"></i> Delete Template
                    </button>
                `;
                
                // Add event listeners to update template in real-time
                templateEditor.querySelector('.template-img-input').addEventListener('input', function() {
                    const imgs = document.querySelectorAll('.template-image');
                    if (imgs[index]) {
                        imgs[index].src = this.value;
                    }
                });
                
                templateEditor.querySelector('.template-title-input').addEventListener('input', function() {
                    const titles = document.querySelectorAll('.template-title');
                    if (titles[index]) {
                        titles[index].textContent = this.value;
                    }
                });
                
                templateEditor.querySelector('.template-category-input').addEventListener('input', function() {
                    const categories = document.querySelectorAll('.template-category');
                    if (categories[index]) {
                        categories[index].textContent = this.value;
                    }
                });
                
                templateEditor.querySelector('.template-desc-input').addEventListener('input', function() {
                    const descs = document.querySelectorAll('.template-desc');
                    if (descs[index]) {
                        descs[index].textContent = this.value;
                    }
                });
                
                templateEditor.querySelector('.template-buttons-input').addEventListener('input', function() {
                    const buttons = this.value.split(',').map(btn => btn.trim()).filter(btn => btn);
                    const btnContainer = document.querySelectorAll('.template-btn-container')[index];
                    
                    if (btnContainer) {
                        btnContainer.innerHTML = '';
                        buttons.forEach(btnText => {
                            const btn = document.createElement('a');
                            btn.href = '#';
                            btn.className = 'template-btn';
                            btn.textContent = btnText;
                            btnContainer.appendChild(btn);
                        });
                    }
                });
                
                editor.appendChild(templateEditor);
            });
        }

        // Add New Template
        function addTemplate() {
            const img = document.getElementById('new-template-img').value.trim();
            const title = document.getElementById('new-template-title').value.trim();
            const category = document.getElementById('new-template-category').value.trim();
            const desc = document.getElementById('new-template-desc').value.trim();
            const buttons = document.getElementById('new-template-buttons').value.split(',').map(btn => btn.trim()).filter(btn => btn);
            
            if (img && title && category && desc) {
                const container = document.getElementById('templates-container');
                
                const template = document.createElement('div');
                template.className = 'template-card';
                
                template.innerHTML = `
                    <img src="${img}" class="template-image">
                    <div class="template-info">
                        <h3 class="template-title">${title}</h3>
                        <span class="template-category">${category}</span>
                        <p class="template-desc">${desc}</p>
                        <div class="template-btn-container">
                            ${buttons.map(btn => `<a href="#" class="template-btn">${btn}</a>`).join('')}
                        </div>
                    </div>
                `;
                
                container.appendChild(template);
                
                // Clear inputs
                document.getElementById('new-template-img').value = '';
                document.getElementById('new-template-title').value = '';
                document.getElementById('new-template-category').value = '';
                document.getElementById('new-template-desc').value = '';
                document.getElementById('new-template-buttons').value = '';
                
                // Update editor
                setupTemplatesEditor();
            }
        }

        // Remove Template
        function removeTemplate(index) {
            const templates = document.querySelectorAll('#templates-container .template-card');
            if (templates[index]) {
                templates[index].remove();
                setupTemplatesEditor();
            }
        }

        // Set Up Pricing Editor
        function setupPricingEditor() {
            const plans = document.querySelectorAll('#pricing-container .pricing-card');
            const editor = document.getElementById('pricing-editor');
            editor.innerHTML = '';
            
            plans.forEach((plan, index) => {
                const title = plan.querySelector('.pricing-title').textContent;
                const price = plan.querySelector('.pricing-price').textContent;
                const features = Array.from(plan.querySelectorAll('.pricing-features li')).map(li => li.textContent.trim());
                const isFeatured = plan.classList.contains('featured');
                
                const planEditor = document.createElement('div');
                planEditor.style.border = '1px solid #eee';
                planEditor.style.borderRadius = '5px';
                planEditor.style.padding = '10px';
                planEditor.style.marginBottom = '10px';
                
                planEditor.innerHTML = `
                    <div class="form-group">
                        <label>Plan Title</label>
                        <input type="text" value="${title}" class="form-control pricing-title-input">
                    </div>
                    <div class="form-group">
                        <label>Plan Price</label>
                        <input type="text" value="${price}" class="form-control pricing-price-input">
                    </div>
                    <div class="form-group">
                        <label>Plan Features (one per line)</label>
                        <textarea class="form-control pricing-features-input" rows="4">${features.join('\n')}</textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="pricing-featured-input" ${isFeatured ? 'checked' : ''}> Featured Plan
                        </label>
                    </div>
                    <button onclick="removePricingPlan(${index})" class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-trash"></i> Delete Plan
                    </button>
                `;
                
                // Add event listeners to update pricing plan in real-time
                planEditor.querySelector('.pricing-title-input').addEventListener('input', function() {
                    const titles = document.querySelectorAll('.pricing-title');
                    if (titles[index]) {
                        titles[index].textContent = this.value;
                    }
                });
                
                planEditor.querySelector('.pricing-price-input').addEventListener('input', function() {
                    const prices = document.querySelectorAll('.pricing-price');
                    if (prices[index]) {
                        prices[index].textContent = this.value;
                    }
                });
                
                planEditor.querySelector('.pricing-features-input').addEventListener('input', function() {
                    const features = this.value.split('\n').filter(f => f.trim());
                    const featureList = document.querySelectorAll('.pricing-features')[index];
                    
                    if (featureList) {
                        featureList.innerHTML = '';
                        features.forEach(feature => {
                            const li = document.createElement('li');
                            li.innerHTML = `<i class="fas fa-check"></i> ${feature}`;
                            featureList.appendChild(li);
                        });
                    }
                });
                
                planEditor.querySelector('.pricing-featured-input').addEventListener('change', function() {
                    const planCard = document.querySelectorAll('.pricing-card')[index];
                    if (this.checked) {
                        planCard.classList.add('featured');
                    } else {
                        planCard.classList.remove('featured');
                    }
                });
                
                editor.appendChild(planEditor);
            });
        }

        // Add New Pricing Plan
        function addPricingPlan() {
            const title = document.getElementById('new-pricing-title').value.trim();
            const price = document.getElementById('new-pricing-price').value.trim();
            const features = document.getElementById('new-pricing-features').value.split('\n').filter(f => f.trim());
            const isFeatured = document.getElementById('new-pricing-featured').checked;
            
            if (title && price && features.length > 0) {
                const container = document.getElementById('pricing-container');
                
                const plan = document.createElement('div');
                plan.className = 'pricing-card';
                if (isFeatured) plan.classList.add('featured');
                
                plan.innerHTML = `
                    <h3 class="pricing-title">${title}</h3>
                    <div class="pricing-price">${price}</div>
                    <ul class="pricing-features">
                        ${features.map(f => `<li><i class="fas fa-check"></i> ${f}</li>`).join('')}
                    </ul>
                    <a href="#" class="pricing-btn">Get Started</a>
                `;
                
                container.appendChild(plan);
                
                // Clear inputs
                document.getElementById('new-pricing-title').value = '';
                document.getElementById('new-pricing-price').value = '';
                document.getElementById('new-pricing-features').value = '';
                document.getElementById('new-pricing-featured').checked = false;
                
                // Update editor
                setupPricingEditor();
            }
        }

        // Remove Pricing Plan
        function removePricingPlan(index) {
            const plans = document.querySelectorAll('#pricing-container .pricing-card');
            if (plans[index]) {
                plans[index].remove();
                setupPricingEditor();
            }
        }

        // Set Up Resources Editor
        function setupResourcesEditor() {
            const resources = document.querySelectorAll('#resources-container .resource-card');
            const editor = document.getElementById('resources-editor');
            editor.innerHTML = '';
            
            resources.forEach((resource, index) => {
                const title = resource.querySelector('.resource-title').textContent;
                const desc = resource.querySelector('.resource-desc').textContent;
                const imgSrc = resource.querySelector('.resource-image').src;
                const url = resource.querySelector('.resource-link').href;
                
                const resourceEditor = document.createElement('div');
                resourceEditor.style.border = '1px solid #eee';
                resourceEditor.style.borderRadius = '5px';
                resourceEditor.style.padding = '10px';
                resourceEditor.style.marginBottom = '10px';
                
                resourceEditor.innerHTML = `
                    <div class="form-group">
                        <label>Resource Title</label>
                        <input type="text" value="${title}" class="form-control resource-title-input">
                    </div>
                    <div class="form-group">
                        <label>Resource Image URL</label>
                        <input type="text" value="${imgSrc}" class="form-control resource-image-input">
                    </div>
                    <div class="form-group">
                        <label>Resource Description</label>
                        <textarea class="form-control resource-desc-input" rows="2">${desc}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Resource Link URL</label>
                        <input type="text" value="${url}" class="form-control resource-url-input">
                    </div>
                    <button onclick="removeResource(${index})" class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-trash"></i> Delete Resource
                    </button>
                `;
                
                // Add event listeners to update resource in real-time
                resourceEditor.querySelector('.resource-title-input').addEventListener('input', function() {
                    const titles = document.querySelectorAll('.resource-title');
                    if (titles[index]) {
                        titles[index].textContent = this.value;
                    }
                });
                
                resourceEditor.querySelector('.resource-image-input').addEventListener('input', function() {
                    const imgs = document.querySelectorAll('.resource-image');
                    if (imgs[index]) {
                        imgs[index].src = this.value;
                    }
                });
                
                resourceEditor.querySelector('.resource-desc-input').addEventListener('input', function() {
                    const descs = document.querySelectorAll('.resource-desc');
                    if (descs[index]) {
                        descs[index].textContent = this.value;
                    }
                });
                
                resourceEditor.querySelector('.resource-url-input').addEventListener('input', function() {
                    const links = document.querySelectorAll('.resource-link');
                    if (links[index]) {
                        links[index].href = this.value;
                    }
                });
                
                editor.appendChild(resourceEditor);
            });
        }

        // Add New Resource
        function addResource() {
            const title = document.getElementById('new-resource-title').value.trim();
            const image = document.getElementById('new-resource-image').value.trim();
            const desc = document.getElementById('new-resource-desc').value.trim();
            const url = document.getElementById('new-resource-url').value.trim();
            
            if (title && image && desc && url) {
                const container = document.getElementById('resources-container');
                
                const resource = document.createElement('div');
                resource.className = 'resource-card';
                
                resource.innerHTML = `
                    <img src="${image}" class="resource-image">
                    <div class="resource-info">
                        <h3 class="resource-title">${title}</h3>
                        <p class="resource-desc">${desc}</p>
                        <a href="${url}" class="resource-link">Read More →</a>
                    </div>
                `;
                
                container.appendChild(resource);
                
                // Clear inputs
                document.getElementById('new-resource-title').value = '';
                document.getElementById('new-resource-image').value = '';
                document.getElementById('new-resource-desc').value = '';
                document.getElementById('new-resource-url').value = '';
                
                // Update editor
                setupResourcesEditor();
            }
        }

        // Remove Resource
        function removeResource(index) {
            const resources = document.querySelectorAll('#resources-container .resource-card');
            if (resources[index]) {
                resources[index].remove();
                setupResourcesEditor();
            }
        }

        // Set Up Testimonials Editor
        function setupTestimonialsEditor() {
            const testimonials = document.querySelectorAll('#testimonials-container .testimonial-card');
            const editor = document.getElementById('testimonials-editor');
            editor.innerHTML = '';
            
            testimonials.forEach((testimonial, index) => {
                const text = testimonial.querySelector('.testimonial-text').textContent.replace(/^"|"$/g, '');
                const author = testimonial.querySelector('.testimonial-author').textContent;
                const role = testimonial.querySelector('.testimonial-role').textContent;
                
                const testimonialEditor = document.createElement('div');
                testimonialEditor.style.border = '1px solid #eee';
                testimonialEditor.style.borderRadius = '5px';
                testimonialEditor.style.padding = '10px';
                testimonialEditor.style.marginBottom = '10px';
                
                testimonialEditor.innerHTML = `
                    <div class="form-group">
                        <label>Testimonial Text</label>
                        <textarea class="form-control testimonial-text-input" rows="2">${text}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Author Name</label>
                        <input type="text" value="${author}" class="form-control testimonial-author-input">
                    </div>
                    <div class="form-group">
                        <label>Author Role</label>
                        <input type="text" value="${role}" class="form-control testimonial-role-input">
                    </div>
                    <button onclick="removeTestimonial(${index})" class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-trash"></i> Delete Testimonial
                    </button>
                `;
                
                // Add event listeners to update testimonial in real-time
                testimonialEditor.querySelector('.testimonial-text-input').addEventListener('input', function() {
                    const texts = document.querySelectorAll('.testimonial-text');
                    if (texts[index]) {
                        texts[index].textContent = `"${this.value}"`;
                    }
                });
                
                testimonialEditor.querySelector('.testimonial-author-input').addEventListener('input', function() {
                    const authors = document.querySelectorAll('.testimonial-author');
                    if (authors[index]) {
                        authors[index].textContent = this.value;
                    }
                });
                
                testimonialEditor.querySelector('.testimonial-role-input').addEventListener('input', function() {
                    const roles = document.querySelectorAll('.testimonial-role');
                    if (roles[index]) {
                        roles[index].textContent = this.value;
                    }
                });
                
                editor.appendChild(testimonialEditor);
            });
        }

        // Add Testimonial
        function addTestimonial() {
            const text = document.getElementById('testimonial-text').value.trim();
            const author = document.getElementById('testimonial-author').value.trim();
            const role = document.getElementById('testimonial-role').value.trim();
            
            if (text && author) {
                const container = document.getElementById('testimonials-container');
                
                const card = document.createElement('div');
                card.className = 'testimonial-card';
                
                card.innerHTML = `
                    <div class="testimonial-text">"${text}"</div>
                    <div class="testimonial-author">${author}</div>
                    <div class="testimonial-role">${role || 'Customer'}</div>
                    <button class="delete-testimonial-btn" onclick="removeTestimonial(this)">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                
                container.appendChild(card);
                
                // Clear input fields
                document.getElementById('testimonial-text').value = '';
                document.getElementById('testimonial-author').value = '';
                document.getElementById('testimonial-role').value = '';
                
                // Update editor
                setupTestimonialsEditor();
            }
        }

        // Remove Testimonial
        function removeTestimonial(btn) {
            const card = btn.closest('.testimonial-card');
            if (card) {
                card.remove();
                setupTestimonialsEditor();
            }
        }

        // Set Up Gallery Editor
        function setupGalleryEditor() {
            const galleryItems = document.querySelectorAll('#gallery-container .gallery-item');
            const editor = document.getElementById('gallery-images-container');
            editor.innerHTML = '';
            
            galleryItems.forEach((item, index) => {
                const imgSrc = item.querySelector('.gallery-image').src;
                const title = item.querySelector('.gallery-title').textContent;
                const desc = item.querySelector('.gallery-desc').textContent;
                
                const galleryEditor = document.createElement('div');
                galleryEditor.style.border = '1px solid #eee';
                galleryEditor.style.borderRadius = '5px';
                galleryEditor.style.padding = '10px';
                galleryEditor.style.marginBottom = '10px';
                
                galleryEditor.innerHTML = `
                    <div class="form-group">
                        <label>Image URL</label>
                        <input type="text" value="${imgSrc}" class="form-control gallery-img-input">
                    </div>
                    <div class="form-group">
                        <label>Image Title</label>
                        <input type="text" value="${title}" class="form-control gallery-title-input">
                    </div>
                    <div class="form-group">
                        <label>Image Description</label>
                        <textarea class="form-control gallery-desc-input" rows="2">${desc}</textarea>
                    </div>
                    <button onclick="removeGalleryItem(${index})" class="btn btn-danger" style="width: 100%;">
                        <i class="fas fa-trash"></i> Delete Image
                    </button>
                `;
                
                // Add event listeners to update gallery item in real-time
                galleryEditor.querySelector('.gallery-img-input').addEventListener('input', function() {
                    const imgs = document.querySelectorAll('.gallery-image');
                    if (imgs[index]) {
                        imgs[index].src = this.value;
                    }
                });
                
                galleryEditor.querySelector('.gallery-title-input').addEventListener('input', function() {
                    const titles = document.querySelectorAll('.gallery-title');
                    if (titles[index]) {
                        titles[index].textContent = this.value;
                    }
                });
                
                galleryEditor.querySelector('.gallery-desc-input').addEventListener('input', function() {
                    const descs = document.querySelectorAll('.gallery-desc');
                    if (descs[index]) {
                        descs[index].textContent = this.value;
                    }
                });
                
                editor.appendChild(galleryEditor);
            });
        }

        // Add Default Gallery Images
        function addDefaultGalleryImages() {
            const defaultImages = [
                {
                    src: 'https://images.pexels.com/photos/31999537/pexels-photo-31999537/free-photo-of-black-and-white-street-scene-in-compiegne.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
                    title: 'Street Scene',
                    desc: 'Beautiful black and white street photography'
                },
                {
                    src: 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=600',
                    title: 'Team Meeting',
                    desc: 'Professional team working together'
                },
                {
                    src: 'https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=600',
                    title: 'Office Space',
                    desc: 'Modern workspace design'
                }
            ];
            
            defaultImages.forEach(img => {
                addGalleryImage(img.src, img.title, img.desc);
            });
        }

        // Add Gallery Image from URL
        function addGalleryImageFromUrl() {
            const imageUrl = document.getElementById('gallery-image-url').value.trim();
            const title = document.getElementById('gallery-image-title').value || 'Image';
            const description = document.getElementById('gallery-image-description').value || '';
            
            if (imageUrl) {
                addGalleryImage(imageUrl, title, description);
                
                // Clear input fields
                document.getElementById('gallery-image-url').value = '';
                document.getElementById('gallery-image-title').value = '';
                document.getElementById('gallery-image-description').value = '';
            }
        }

        // Add Gallery Image
        function addGalleryImage(imgUrl, title, description) {
            const container = document.getElementById('gallery-container');
            
            const item = document.createElement('div');
            item.className = 'gallery-item';
            
            item.innerHTML = `
                <img src="${imgUrl}" class="gallery-image">
                <div class="gallery-info">
                    <div class="gallery-title">${title}</div>
                    <div class="gallery-desc">${description}</div>
                </div>
                <button class="delete-gallery-btn" onclick="removeGalleryItem(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            container.appendChild(item);
            setupGalleryEditor();
        }

        // Remove Gallery Item
        function removeGalleryItem(btn) {
            const item = btn.closest('.gallery-item');
            if (item) {
                item.remove();
                setupGalleryEditor();
            }
        }

        // Save All Changes (temporary for current session only)
        function saveChanges() {
            // Update business info
            document.getElementById('logo').textContent = document.getElementById('business-name').value;
            document.getElementById('footer-col1-title').textContent = document.getElementById('business-name').value;
            document.getElementById('footer-col1-desc').textContent = document.getElementById('business-slogan').value;
            
            // Update hero section
            document.getElementById('hero-title').textContent = document.getElementById('hero-title-text').value;
            document.getElementById('hero-subtitle').textContent = document.getElementById('hero-subtitle-text').value;
            document.getElementById('hero-button').textContent = document.getElementById('hero-button-text').value;
            
            // Update section headings
            document.getElementById('templates-title').textContent = document.getElementById('templates-heading').value;
            document.getElementById('features-title').textContent = document.getElementById('features-heading').value;
            document.getElementById('pricing-title').textContent = document.getElementById('pricing-heading').value;
            document.getElementById('about-title').textContent = document.getElementById('about-heading').value;
            document.getElementById('resources-title').textContent = document.getElementById('resources-heading').value;
            document.getElementById('gallery-title').textContent = document.getElementById('gallery-heading').value;
            document.getElementById('testimonials-title').textContent = document.getElementById('testimonials-heading').value;
            document.getElementById('contact-title').textContent = document.getElementById('contact-heading').value;
            document.getElementById('cta-title').textContent = document.getElementById('cta-heading').value;
            
            // Update about section
            document.querySelector('.about-image img').src = document.getElementById('about-image').value;
            document.getElementById('about-content-text').textContent = document.getElementById('about-content').value;
            
            // Update contact info
            document.getElementById('contact-address-text').textContent = document.getElementById('contact-address').value;
            document.getElementById('contact-phone-text').textContent = document.getElementById('contact-phone').value;
            document.getElementById('contact-email-text').textContent = document.getElementById('contact-email').value;
            document.getElementById('contact-hours-text').textContent = document.getElementById('contact-hours').value;
            
            // Update copyright
            document.getElementById('copyright-text').textContent = document.getElementById('copyright-text').value;
            
            alert('Changes saved successfully!');
            document.getElementById('admin-panel').classList.remove('show');
        }

        // Preview Website
        function previewWebsite() {
            // First save all changes
            saveChanges();
            
            // Add preview mode class to body
            document.body.classList.add('preview-mode');
            
            // Scroll to top
            window.scrollTo(0, 0);
            
            // Show message
            alert('You are now in preview mode. The admin panel is hidden. Refresh the page to exit preview mode.');
        }

        // Download Website
     function downloadWebsite() {
            // Prompt for password
            const password = prompt("Enter the download password:");
            
            // Check if the password is correct (replace 'yourpassword' with your actual password)
            if (password === "yourpassword") {
                // First save all changes
                saveChanges();
                
                // Create a clone of the document
                const docClone = document.documentElement.cloneNode(true);
                
                // Remove admin elements from the clone
                const adminElements = docClone.querySelectorAll('.admin-btn, .admin-panel, .download-btn, #publish-btn');
                adminElements.forEach(el => el.remove());
                
                // Create HTML string
                const html = `<!DOCTYPE html>${docClone.outerHTML}`;
                
                // Create blob and download
                const blob = new Blob([html], {type: 'text/html'});
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'website.html';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
                
                alert('Website downloaded successfully!');
            } else {
                alert("Incorrect password. Download failed.");
            }
        }
       
       
       
    </script>
</body>
</html>