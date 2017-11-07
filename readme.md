-------------------------
A navegação ocorre da seguinte forma:
Exemplo:
	www.meusite.com/galeria/abrir/123

	galeria = seria a classe galeriaController
	abrir = é um método da classa galeriaController
	123 = parametros

Ou seja, toda a navegção é realizada dessa forma, chamando os controllers.
Isso tudo é tratado no Core.php

------------------------------------------

-pasta core:
	-contem arquivos auxiliadores.

-arquivo .htaccess:
	- Serve para construção de urls amigáveis
	- RewriteEngine On: da o start no modo de reescrita, é padrão começar dessa forma.
    - RewriteCond %{REQUEST_FILENAME} !-f : Faz com q o usuário não acesse arquivos diretamente
    - RewriteCond %{REQUEST_FILENAME} !-d : Faz com q o usuário não acesse pastas diretamente
    - RewriteRule ^(.*)$ /MVC_Classificados/index.php?url=$1 [QSA,L] : regra criada, por exemplo,
    	se o usuário digitar www.meusite.com/contato, na realidade ele estará acessando a seguinte url, 
    	www.meusite.com/index.php?url=contato

-arquivo config.php:
	-Conexão com o BD

-arquivo environment.php:
	-Serve para auxiliar a conexão com o banco, definindo uma constante que pode ser production (quando o site está no ar) e development(quando o site ainda está local).
	- Caso eu queira mandar o programa para um servidor, é so alterar o ENVIRONMENT para production, simples assim. 

-arquivo controller.php:
	-Serve para renderizar as paginas, ou seja, chama as views