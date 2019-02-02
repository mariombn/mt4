# Senha Segura - MT4 - Teste

### Requisitos Minimos para Funcionamento

- php 5.6 ou superior com a biblioteca ssh2 instalada `sudo apt update && sudo apt install php5.6-ssh2`
- Apache ou Nginx
- Banco de Dados MySQL ou MariaDB

### Instalação

#### Configurações do Servidor Web

Coloque a aplicação dentro do seu servior web, lembrando que a pasta publica deverá ser a pasta `/mt4/public/`.

Configuração usada no Servidor de Desenvolvimento (Ubuntu 18.04 LTS + Apache):

```xml
<VirtualHost *:80>
    ServerName mt4.local
    ServerAdmin webmaster@localhost
    DocumentRoot  /var/sandbox/mt4/public/
    ErrorLog ${APACHE_LOG_DIR}/mt4-error.log
    CustomLog ${APACHE_LOG_DIR}/mt4-access.log combined
    <Directory  /var/sandbox/mt4/public/>
        Options Indexes FollowSymLinks
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```

#### Configurações do Banco de Dados

Renomear o arquivo `/mt4/config/config.ini-dist` para `config.ini`

```bash
cp config/config.ini-dist config/config.ini
```

Depois, abra o mesmo e coloque as configurações de conexão do seu banco de dados MySQL ou MariaDB conforme exemplo:

```ini
[Application]

APP_TITLE=MT4 - Senha Segura
APP_VERSION=1.0.0

[Database Settings]

DB_HOSTNAME=127.0.0.1
DB_DATABASE=mt4
DB_USERNAME=root
DB_PASSWORD=local
```
Depois disso, rode o arquivo `/mt4/migrations/apply.sql` em seu banco de dados.