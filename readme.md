# App Umentor
Projeto de teste técnico, com a finalidade de cadastro de usuários.

## Tecnologias Utilizadas
- **CodeIgniter 4**: Framework PHP utilizado para o desenvolvimento do projeto em padrão MVC.
- **Jquery**: Biblioteca Javascript utilizada para manipulação do DOM, interação com o servidor e validação de formulários client-side
- **Bootstrap**: Framework CSS para desenvolvimento de interfaces responsivas
- **SweetAlert2**: Biblioteca utilizada para criação de modais de interação e estilização das validações do formulário

## Requisitos do Ambiente
- PHP >= 8
- MySQL
- Web Server Apache

## Instalação
**1. Clonar o Repositório:**
```bash
git clone https://github.com/iandell026/AppUmentor.git
```

**2. Configuração do Banco de Dados:**
- Navegue até o arquivo "App/Config/Database.php".
- Localize a seção das configurações de host, usuario, senha (dentro do array $default)
- Altere se necessário
- Script para criação da Database:
```bash
CREATE SCHEMA `umentor_db` DEFAULT CHARACTER SET utf8mb4 ;
```

**3. Instalar Dependências do Composer:**
```bash
composer install
```

**4. Instalar Spark**
```bash
composer require codeigniter4/spark
```

**5. Executar Migração da Tabela:**
```bash
php spark migrate
```

**6. Executar o Seeder:**
```bash
php spark db:seed DadosUsuarios
```

**7. Iniciar Servidor de Desenvolvimento:**
```bash
php spark serve
```

## Estrutura de Diretórios
Estrutura do projeto é organizada em padrão MVC através do CodeIgniter 4. Onde os arquivos de configurações gerais, lógica do sistema, modelagem de dados e interface do usuário se encontram dentro da pasta "App". Parte de logs é localizada no diretório "writable"

## Uso
1. **Base de dados para teste** 
- Para importar os dados fictícios no banco, basta realizar a migração e seed dos dados com o spark, conforme os passos anteriores.
2. **Interação no sistema** 
- O projeto possui 2 telas:
- Na principal é exibida a tabela com os dados dos usuários, sendo possível adicionar em tempo real novos registros, ou excluir os existentes.
- A segunda tela é de edição de usuários, para acessá-la basta clicar em "Editar" (referente ao usuário desejado) dentro da tabela inicial. Ao editar um registro e confirmar a alteração, você será redirecionado a tela principal novamente, ou pode cancelar a operação clicando no botão "Voltar".


## Contato
- **E-mail:** iandell.rl@gmail.com
- **Linkedin:** https://www.linkedin.com/in/iandellrl/