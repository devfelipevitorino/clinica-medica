# Sistema de Clínica Médica

## 📌 Visão Geral
O **Sistema de Clínica Médica** é uma aplicação web fullstack desenvolvida em **Laravel**, criada para gerenciar pacientes, médicos, consultas e especialidades. O projeto utiliza o padrão **Controller → Service → Repository**.

A aplicação inclui CRUD completo para pacientes, médicos, especialidades, endereços, gerenciamento de consultas e validações.

---

## 🚀 Tecnologias Utilizadas
- **PHP 8**
- **Laravel 12**
- **Blade** 
- **Bootstrap**
- **MySQL**
- **Eloquent ORM**
- **Composer**
- **Node.js & NPM**

---

## 🛠️ Funcionalidades
- Cadastro e gerenciamento de **Pacientes**
- Cadastro e gerenciamento de **Médicos**
- Associação entre Paciente/Médico e **Endereços**
- Cadastro de **Consultas**
- Sistema organizado com **Services e Repositories**
- Seeders para popular banco de dados

---

## 📦 Como Instalar

### 1️⃣ Clonar o repositório
```bash
git clone https://github.com/devfelipevitorino/clinica-medica.git
cd clinica_medica
```

### 2️⃣ Instalar dependências do backend
```bash
composer install
```

### 3️⃣ Instalar dependências do frontend
```bash
npm install
npm run build  # ou 'npm run dev' durante o desenvolvimento
```

### 4️⃣ Copiar variáveis de ambiente
```bash
cp .env.example .env
```

### 5️⃣ Gerar key da aplicação
```bash
php artisan key:generate
```

### 6️⃣ Configurar banco de dados no .env
```bash
DB_DATABASE=clinica_medica
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 7️⃣ Rodar migrations e seeders
```bash
php artisan migrate --seed
```

### 8️⃣ Iniciar o servidor
```bash
php artisan serve
npm run dev
```
