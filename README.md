# Explicação do arquivo docker-compose

version: '3' -> ultima versao do docker-compose
services: -> serviços a serem executados
  db: -> servico mysql
    image: mysql:5.7 -> imagem base do mysql
    ports: -> atribuição de porta externa para a interna
      - '3307:3306' -> valor da esquerda porta externa para conexão workbench, valor da direita porta interna utilizado pelo container
    environment: -> configuração de acesso mysql
       MYSQL_DATABASE: 'proposta' -> database criado dentro do container
       MYSQL_USER: 'proposta' -> usuario do mysql
       MYSQL_PASSWORD: 'q1w2e3r4' -> senha do usuario mysql
       MYSQL_ROOT_PASSWORD: 'q1w2e3r4' -> usuario root do mysql
  web: -> serviço php + apache2
    build:
      context: ./ -> caminho do arquivo Dockerfile
    volumes:
      - ./:/app -> montando conexao com pasta do windows para pasta do container
    ports:
      - "8000:80" -> valor da esquerda é a porta acessado externamente, valor da direita é a porta utilizada pelo apache2 dentro do container
    depends_on:
      - db -> indica que o serviço web só vai ser executado depois do serviço de banco de dados

# Explicação do arquivo Dockerfile

FROM webdevops/php-apache:alpine-php7 -> imagem base onde consta o PHP 7 junto com apache2
COPY . /app -> está copiando a raiz do código para a pasta app onde o apache2 esta apontando como localhost