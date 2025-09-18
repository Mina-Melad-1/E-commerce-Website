<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-6">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">🛒 E-commerce Website</h1>
            <div class="flex justify-center gap-4 flex-wrap mb-6">
                <span class="badge bg-red-100 text-red-800">Laravel 10+</span>
                <span class="badge bg-blue-100 text-blue-800">PHP 8+</span>
                <span class="badge bg-indigo-100 text-indigo-800">MySQL 8+</span>
                <a href="https://opensource.org/licenses/MIT" class="badge bg-yellow-100 text-yellow-800">License: MIT</a>
            </div>
            <p class="text-lg text-gray-600">A modern, full-featured e-commerce platform built with Laravel. Browse products, manage carts, and place orders seamlessly. Admins get a powerful dashboard to handle inventory and sales.</p>
            <div class="section-card mt-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">🚀 Quick Start</h3>
                <p class="text-gray-600">Clone the repo, install dependencies, set up the database, and run <code class="bg-gray-200 px-1 rounded">php artisan serve</code>. You're live in minutes!</p>
                <a href="#installation" class="btn btn-primary mt-4">Get Started</a>
            </div>
        </div>
        <!-- About -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">📖 About the Project</h2>
            <p class="text-gray-600">This project is a complete e-commerce solution designed for small-to-medium online stores. It leverages Laravel's ecosystem to deliver a secure, scalable, and user-friendly experience. Perfect for developers learning full-stack PHP or business owners prototyping a shop.</p>
        </section>
        <!-- Features -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">🌟 Key Features</h2>
            <table class="w-full border-collapse bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-4 text-left text-gray-800 font-semibold">Feature</th>
                        <th class="p-4 text-left text-gray-800 font-semibold">Description</th>
                        <th class="p-4 text-left text-gray-800 font-semibold">Tech Highlights</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-4">Product Browsing</td>
                        <td class="p-4">Explore categorized products with search and filters.</td>
                        <td class="p-4">Eloquent ORM, Blade views.</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">Shopping Cart</td>
                        <td class="p-4">Add/remove items, update quantities, view totals.</td>
                        <td class="p-4">Session-based cart, AJAX for UX.</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">Order Placement</td>
                        <td class="p-4">Secure checkout with authentication.</td>
                        <td class="p-4">Breeze auth, Mailables.</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">Admin Dashboard</td>
                        <td class="p-4">Manage products, categories, orders via CRUD interfaces.</td>
                        <td class="p-4">Role-based access, admin panels.</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">User Authentication</td>
                        <td class="p-4">Register, login, password reset, profile management.</td>
                        <td class="p-4">Laravel Breeze, Tailwind CSS.</td>
                    </tr>
                    <tr>
                        <td class="p-4">Responsive Design</td>
                        <td class="p-4">Mobile-first layout for all devices.</td>
                        <td class="p-4">Tailwind CSS, Alpine.js.</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <!-- Tech Stack -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">🛠️ Tech Stack</h2>
            <ul class="list-disc pl-6 text-gray-600">
                <li><strong>Backend</strong>: Laravel 10+ (PHP 8+), Eloquent ORM</li>
                <li><strong>Frontend</strong>: Blade Templates, Tailwind CSS 3+, Alpine.js</li>
                <li><strong>Database</strong>: MySQL 8+ (migrations & seeders)</li>
                <li><strong>Authentication</strong>: Laravel Breeze</li>
                <li><strong>Tools</strong>: Composer, Artisan CLI, Git</li>
            </ul>
            <p class="mt-4 text-gray-600">Follows Laravel's MVC architecture with models (Product, Category, Order, User), controllers, Blade views, and modular routes.</p>
        </section>
        <!-- Installation -->
        <section id="installation" class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">💻 Installation</h2>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Prerequisites</h3>
            <ul class="list-disc pl-6 text-gray-600">
                <li>PHP 8.1+</li>
                <li>Composer</li>
                <li>MySQL 8.0+</li>
                <li>Node.js & NPM</li>
            </ul>
            <h3 class="text-xl font-semibold text-gray-800 mt-4 mb-2">Step-by-Step Setup</h3>
            <ol class="list-decimal pl-6 text-gray-600">
                <li><strong>Clone the Repo</strong><br>
                    <code class="bg-gray-200 p-2 rounded block mt-1">git clone https://github.com/Mina-Melad-1/E-commerce-Website.git<br>cd E-commerce-Website</code>
                </li>
                <li><strong>Install Dependencies</strong><br>
                    <code class="bg-gray-200 p-2 rounded block mt-1">composer install<br>npm install</code>
                </li>
                <li><strong>Environment Configuration</strong><br>
                    Copy <code>.env.example</code> to <code>.env</code> and configure:<br>
                    <code class="bg-gray-200 p-2 rounded block mt-1">
                        DB_CONNECTION=mysql<br>
                        DB_HOST=127.0.0.1<br>
                        DB_PORT=3306<br>
                        DB_DATABASE=your_ecommerce_db<br>
                        DB_USERNAME=your_username<br>
                        DB_PASSWORD=your_password
                    </code>
                    Generate app key:<br>
                    <code class="bg-gray-200 p-2 rounded block mt-1">php artisan key:generate</code>
                </li>
                <li><strong>Database Setup</strong><br>
                    <code class="bg-gray-200 p-2 rounded block mt-1">php artisan migrate<br>php artisan db:seed</code>
                </li>
                <li><strong>Compile Assets</strong><br>
                    <code class="bg-gray-200 p-2 rounded block mt-1">npm run dev</code>
                </li>
                <li><strong>Run the Server</strong><br>
                    <code class="bg-gray-200 p-2 rounded block mt-1">php artisan serve</code><br>
                    Visit <a href="http://127.0.0.1:8000" class="text-blue-600 hover:underline">http://127.0.0.1:8000</a>.
                </li>
            </ol>
        </section>
        <!-- Usage -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">🔍 Usage</h2>
            <ul class="list-disc pl-6 text-gray-600">
                <li><strong>Users</strong>: Register/login → Browse <code>/products</code> → Add to cart → Checkout at <code>/cart</code>.</li>
                <li><strong>Admins</strong>: Login (e.g., admin@example.com/password) → Access <code>/admin</code> → Manage via dashboard.</li>
                <li><strong>Customization</strong>: Extend models for wishlists/reviews. Add API routes in <code>routes/api.php</code>.</li>
            </ul>
        </section>
        <!-- Screenshots -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">📸 Screenshots</h2>
            <p class="text-gray-600 mb-4">*(Upload images to `assets/screenshots/` and update paths below)*</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                ![Image Alt](https://github.com/Mina-Melad-1/E-commerce-Website/blob/a5c91de8d25d67e93c2949eb73640fd34493b637/home.jpg.png)
                ![Image Alt](https://github.com/Mina-Melad-1/E-commerce-Website/blob/a5c91de8d25d67e93c2949eb73640fd34493b637/cart.jpg.png)
                ![Image Alt](https://github.com/Mina-Melad-1/E-commerce-Website/blob/a5c91de8d25d67e93c2949eb73640fd34493b637/Admin_Dashboard.jpg.png)
                </div>
            </div>
        </section>
        <!-- Contributing -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">🤝 Contributing</h2>
            <p class="text-gray-600">Contributions are welcome! Fork the repo, create a feature branch, and open a Pull Request.</p>
            <ol class="list-decimal pl-6 text-gray-600 mt-2">
                <li>Fork the project.</li>
                <li>Create a feature branch (<code>git checkout -b feature/amazing-feature</code>).</li>
                <li>Commit changes (<code>git commit -m 'Add some amazing feature'</code>).</li>
                <li>Push to the branch (<code>git push origin feature/amazing-feature</code>).</li>
                <li>Open a Pull Request.</li>
            </ol>
            <p class="text-gray-600 mt-2">Adhere to <a href="https://laravel.com/docs/contributions#code-of-conduct" class="text-blue-600 hover:underline">Laravel's Code of Conduct</a>.</p>
        </section>
        <!-- License -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">📄 License</h2>
            <p class="text-gray-600">This project is licensed under the MIT License - see the <a href="LICENSE" class="text-blue-600 hover:underline">LICENSE</a> file for details.</p>
        </section>
        <!-- Acknowledgments -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">🙏 Acknowledgments</h2>
            <ul class="list-disc pl-6 text-gray-600">
                <li><a href="https://laravel.com" class="text-blue-600 hover:underline">Laravel Framework</a> – The backbone of this project.</li>
                <li><a href="https://laravel.com/docs/starter-kits#laravel-breeze" class="text-blue-600 hover:underline">Laravel Breeze</a> – For auth scaffolding.</li>
                <li>Built with ❤️ by <a href="https://github.com/Mina-Melad-1" class="text-blue-600 hover:underline">Mina Melad</a>.</li>
            </ul>
        </section>
        <!-- Footer -->
        <div class="text-center text-gray-600">
            <p>⭐ Star this repo if it helps you! Questions? Open an issue.</p>
            <p class="mt-2">Last Updated: September 18, 2025</p>
        </div>
    </div>
</body>
</html>
