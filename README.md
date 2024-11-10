# Projeto Backend - CRUD com Sistema de Login (Laravel)
Este é o projeto backend desenvolvido em Laravel, que contém um CRUD com sistema de login. A seguir, estão as instruções para rodar o projeto localmente.

## Requisitos
PHP (versão 7.4.33)  
Composer (versão 2.7.7)  
Laravel (versão 8.83.27)
## Instalação
### 1. Clonar o repositório
Clone o repositório do projeto para sua máquina local:
```
    git clone <URL_DO_REPOSITORIO>
    cd <NOME_DO_PROJETO>
```
### 2. Instalar as dependências
Para instalar as dependências do Laravel, utilize o Composer. Caso não tenha o Composer instalado, faça o download e instalação aqui.

Execute o comando abaixo para instalar as dependências:
```
    composer install
```
Isso irá baixar todas as dependências do projeto listadas no arquivo composer.json.

### 3. Configurar o arquivo .env
O Laravel usa o arquivo .env para gerenciar as configurações de ambiente. Você precisa configurar as variáveis de ambiente, como banco de dados, e-mail, e outras configurações específicas.

Copie o arquivo .env.example para .env:
```
    cp .env.example .env
```
Abra o arquivo .env e configure as variáveis de ambiente, como a conexão com o banco de dados. Por exemplo:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<NOME_DO_BANCO>
DB_USERNAME=<USUARIO_BANCO>
DB_PASSWORD=<SENHA_BANCO>
```
### 4. Gerar a chave do aplicativo
Para gerar a chave do aplicativo, que é usada para a criptografia, execute o comando:
```
php artisan key:generate
```
### 5. Rodar as migrações do banco de dados
O Laravel utiliza migrações para criar a estrutura do banco de dados. Execute as migrações com o seguinte comando:
```
    php artisan migrate
```

Este comando criará as tabelas necessárias no banco de dados, incluindo as tabelas para o sistema de autenticação, caso estejam configuradas.

### 6. Rodar o servidor de desenvolvimento
Para rodar o servidor de desenvolvimento integrado do Laravel, execute o seguinte comando:
```
    php artisan serve
```
Isso iniciará o servidor na URL http://localhost:8000. Você pode acessar a API do backend através desse endereço.

Nota: O servidor de desenvolvimento do Laravel não deve ser usado em ambientes de produção. Para produção, use servidores web como Apache ou Nginx.

## Funcionalidades
Sistema de Login: Autenticação de usuários via API.  
CRUD: Funcionalidades para criar, ler, atualizar e excluir registros.
## Tecnologias Utilizadas
Laravel 8.83.27  
PHP 7.4.33  
Composer 2.7.7  
MySQL ou MariaDB (conforme configurado no .env)