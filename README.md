# Larapulse
Larapulse is a custom implementation of the popular PHP framework, Laravel. It's designed to meet your specific needs, with tailored features and optimizations to enhance development efficiency, flexibility, and performance.

## Features
- **Customized Laravel Framework:** <br />
Larapulse extends Laravel with additional features and optimizations tailored to your requirements.

- **Enhanced Development Efficiency:** <br />
Boost your productivity with pre-configured setups, tools, and best practices.

- **Flexible Architecture:** <br />
Build applications that suit your project's unique needs while maintaining Laravel's elegance.

- **Performance Optimizations:** <br />
Fine-tuned performance enhancements to ensure your application runs smoothly and efficiently.

## Getting Started
### For Contributors
Follow these steps to get started with Larapulse:
```bash
git clone git@github.com:kangketikonlen/larapulse.git
composer install && npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```
### For Auto Deployment
Follow these steps to get started with Larapulse:
- Fork or copy this repository to your account. You will see a failed github actions because the secret environment is not set yet.
- Login to your server, navigate to your desired directory, and create a new folder named **larapulse**.
- Go to the Repository Setting > Actions > General. Search **Workflow Permission** and set to Read and write permission.
- On the same page, go to Secrets and Variables > Actions. Then, create a new repository secret with the following:

| Name                      | Secret                      |
| ------------------------- | --------------------------- |
| SERVER                    | YOUR SERVER IP              |
| USERNAME                  | YOUR SERVER USERNAME        |
| PASSWORD                  | YOUR SERVER PASSWORD        |
| SSH_PORT                  | YOUR SERVER SSH PORT        |
| DIRECTORY                 | YOUR LARAPULSE DIRECTORY    |
| DB_USERNAME               | YOUR DATABASE USERNAME      |
| DB_PASSWORD               | YOUR DATABASE PASSWORD      |
| DOCKER_DATABASE_USERNAME  | YOUR DATABASE USERNAME      |
| DOCKER_DATABASE_PASSWORD  | YOUR DATABASE PASSWORD      |
| WEB_URL                   | YOUR LARAPULSE URL          |
- Create new first tag `v0.1`
- Make sure there is no running actions on action page then, re run the first failed action.
If you face some problem, feel free to open an issue.
