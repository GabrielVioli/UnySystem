Sistema de Gerenciamento de Produtos
====================================

Um sistema web completo para gerenciamento de usuários e produtos, construído com PHP e Laravel. A aplicação permite que usuários se cadastrem, façam login e gerenciem seu próprio catálogo de produtos, incluindo upload de imagens e um painel com métricas financeiras.

Funcionalidades
---------------

**Autenticação e Usuários**

*   Cadastro, Login e Logout seguros.
    
*   Visualização e edição de perfil (Nome, E-mail, Senha).
    
*   Rotas protegidas por Middleware (apenas usuários logados acessam o sistema interno).
    

**Painel de Controle (Dashboard)**

*   Exibição do primeiro e do último produto cadastrado pelo usuário.
    
*   Contagem total de produtos cadastrados.
    
*   Soma total do valor (preço) dos produtos em estoque.
    

**Gestão de Produtos (CRUD)**

*   Criação de produtos com upload de imagem.
    
*   Listagem global e página de detalhes do produto.
    
*   Edição e Exclusão de produtos (com validação para garantir que o usuário só altere seus próprios registros).
    
*   Exclusão em massa (Apagar todos os produtos do usuário logado).
    
*   Sistema de busca de produtos por nome.
    

Tecnologias Utilizadas
--------------------------

*   **Backend:** PHP, Laravel
    
*   **Banco de Dados:** MySQL
    
*   **Padrão de Arquitetura:** MVC (Model-View-Controller)
    
*   **Segurança:** Hasheamento de senhas, validação de requests e proteção CSRF.
    

Como executar o projeto localmente
-------------------------------------

1.  Clone o repositório:
    
2.  Instale as dependências do PHP.
    
3.  Configure o arquivo de ambiente:Copie o arquivo .env.example para .env e configure suas credenciais de banco de dados.
    
4.  Gere a chave da aplicação com php artisan key:generate
    
5.  Crie as tabelas no banco de dados com as migrations com php artisan migrate.
    
6.  Crie o atalho para a pasta de imagens (Storage) com php artisan storage:link
    
7.  Inicie o servidor local com php artisan serve ou php -S localhost:8000 -t public.
    

Acesse a aplicação em http://localhost:8000.

Estrutura de Rotas Principais
---------------------------------

*   GET / - Página inicial / Listagem de produtos
    
*   GET /login | GET /register - Autenticação
    
*   GET /dashboard - Painel de métricas do usuário
    
*   GET /profile - Perfil do usuário logado
    
*   POST /produto/store - Salva um novo produto
    
*   GET /search - Busca de produtos
