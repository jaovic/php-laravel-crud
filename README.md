# Sistema Laravel CRUD com Autenticação

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.5-blue.svg)
![License](https://img.shields.io/badge/license-MIT-green.svg)

Sistema completo de gerenciamento CRUD desenvolvido em Laravel com sistema robusto de autenticação e autorização.

## 📋 Sobre o Projeto

Este é um sistema web desenvolvido com Laravel que implementa funcionalidades completas de CRUD (Create, Read, Update, Delete) com sistema de autenticação de usuários e controle de acesso baseado em roles (funções).

### ✨ Funcionalidades

- 🔐 Sistema de autenticação (Login/Registro)
- 👤 Gerenciamento de usuários
- 🛡️ Autorização baseada em roles (Admin/User)
- 📊 Dashboard personalizado
- 🔒 Rotas protegidas por middleware
- 💾 Operações CRUD completas
- 🎨 Interface responsiva e moderna

## 🚀 Tecnologias Utilizadas

- **Laravel 11.x** - Framework PHP
- **PHP 8.5** - Linguagem de programação
- **MySQL/SQLite** - Banco de dados
- **Blade** - Template engine
- **Tailwind CSS** - Framework CSS (opcional)

## 📦 Pré-requisitos

Antes de começar, você precisa ter instalado:

- PHP >= 8.2
- Composer
- MySQL ou SQLite
- Node.js e NPM (opcional, para assets)

## 🔧 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/php-laravel-crud.git
cd php-laravel-crud
```

### 2. Instale as dependências

```bash
composer install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure o banco de dados

Edite o arquivo `.env` com suas credenciais:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

**Ou use SQLite (mais simples para desenvolvimento):**

```env
DB_CONNECTION=sqlite
```

Crie o arquivo do banco:
```bash
touch database/database.sqlite
```

### 5. Execute as migrations

```bash
php artisan migrate
```

### 6. (Opcional) Crie um usuário admin

```bash
php artisan tinker
```

Dentro do Tinker:
```php
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password123'),
    'role' => 'admin'
]);
```

### 7. Inicie o servidor

```bash
php artisan serve
```

Acesse: `http://localhost:8000`

## 📁 Estrutura do Projeto

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── AuthController.php
│   │   └── Middleware/
│   │       └── CheckAdmin.php
│   └── Models/
│       └── User.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── admin/
│       │   └── dashboard.blade.php
│       └── dashboard.blade.php
├── routes/
│   └── web.php
└── .env
```

## 🎯 Uso

### Registro de Usuário

1. Acesse `/register`
2. Preencha o formulário com nome, e-mail e senha
3. Clique em "Registrar"

### Login

1. Acesse `/login`
2. Insira e-mail e senha
3. Clique em "Entrar"

### Dashboard

Após autenticado, você será redirecionado para `/dashboard` onde terá acesso às funcionalidades do sistema.

### Área Administrativa

Usuários com role `admin` têm acesso à rota `/admin` com privilégios especiais.

## 🔐 Sistema de Autorização

O sistema implementa dois tipos de usuários:

| Role  | Descrição | Acesso |
|-------|-----------|--------|
| **user** | Usuário padrão | Dashboard básico |
| **admin** | Administrador | Dashboard + Painel Admin |

### Middleware Disponíveis

- `auth` - Protege rotas que requerem autenticação
- `guest` - Permite acesso apenas para não autenticados
- `admin` - Permite acesso apenas para administradores

## 🛠️ Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Executar migrations
php artisan migrate

# Reverter migrations
php artisan migrate:rollback

# Criar um novo controller
php artisan make:controller NomeController

# Criar um novo model
php artisan make:model NomeModel -m

# Criar middleware
php artisan make:middleware NomeMiddleware
```

## 🐛 Troubleshooting

### Erro de Permissão

```bash
chmod -R 775 storage bootstrap/cache
```

### Erro de Deprecation (PHP 8.5)

Se você estiver usando PHP 8.5 e vendo warnings sobre `PDO::MYSQL_ATTR_SSL_CA`, edite `config/database.php` e substitua:

```php
PDO::MYSQL_ATTR_SSL_CA
```

Por:

```php
Pdo\Mysql::ATTR_SSL_CA
```

### Erro 500 no Registro

Ative o debug no `.env`:
```env
APP_DEBUG=true
```

E verifique os logs em `storage/logs/laravel.log`

## 🤝 Contribuindo

Contribuições são sempre bem-vindas! Sinta-se à vontade para:

1. Fazer um Fork do projeto
2. Criar uma Branch para sua Feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a Branch (`git push origin feature/AmazingFeature`)
5. Abrir um Pull Request

## 📝 Roadmap

- [ ] Implementar recuperação de senha
- [ ] Adicionar verificação de e-mail
- [ ] Sistema de permissões mais granular
- [ ] API RESTful
- [ ] Testes automatizados
- [ ] Docker compose para desenvolvimento

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👤 Autor

**João Fernandes**

- GitHub: [@seu-usuario](https://github.com/seu-usuario)
- LinkedIn: [Seu Nome](https://linkedin.com/in/seu-perfil)
- Email: joao.fernandes@example.com

## 🙏 Agradecimentos

- [Laravel](https://laravel.com) - Framework PHP incrível
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS
- Comunidade Laravel Brasil

---

⭐ Se este projeto foi útil para você, considere dar uma estrela!

**Desenvolvido com ❤️ usando Laravel**
