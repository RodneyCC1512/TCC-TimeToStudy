Para a execução do site é necessario a instalação de algumas coisas, tais quais o PHP na maquina onde ira ser inicializado o site(XAMPP ou o próprio PHP), instalar o Composer para o gerenciamento de dependências.

Link do video para instalação do Composer:
https://youtu.be/XO5VFfiqOPI?si=jJtxTj7Pcw8iMnhb

1. Após a finalização da instalação do Composer é necessario abrir o Promp de comando da maquina, insirir "composer -v" para verificar se o Composer realmente foi instalado;

2. Para execução do TCC é necessario o Banco de Dados, podendo ser o MySQL Workbench ou o MySQL do XAMPP;
	2.1 - Caso for usado o MySQL Workbench inicialize o programa, va no explorador de arquivos entre na pasta do TCC e use o arquivo 'BD1';

	2.2 - Caso for usado o MySQL do XAMPP, abra o painel de controle do XAMPP, clique na opção 'Admin' do modulo MySQL;
		* O software ira abrir uma pagina no navegador, va no menu na lateral esquerda, clique em 'Novo';
		* Clique na opção 'Importar' no Navbar;
		* Clique em 'Escolher arquivo' e procure pelo arquivo 'BD2';
		* Va para o final da página e clique no botão 'Importar';

3. Depois de configurar o Banco de dados é necessario que altere as informações do arquivo 'conexao.php', colocando as informações devida para a conexão do Banco de dados.

4. Para poder testar o TCC é necessário uma caixa de email, para onde todos os email's do TCC vão, um recomendado é o mailtrap;
	4.1 Acesse o site "https://mailtrap.io/signin" e faça uma conta no mesmo;
		* Após criar a conta clique na opção 'Email Testing';
		* Clique na lixeira para apagar o 'My Inbox';
		* Depois clique em 'Add Inbox', coloque o nome e clique em 'save';
		* Então clique na nova caixa de email's criada;
		* Abaixo de 'Integrations' tem a opção de selecionar o tipo de informação desejada para enviar email's, clique nela e procure por 'FuelPHP';
		* Coloque os dados que apareceram nos documentos 'Recuperacao.php' e 'Registrar.php;
			- Procure por 'Server settings';
			- Altere os dados de acordo com os dados da página do Mailstrap;
			- Sendo os dados ( 'host',  'port', 'username', 'password');

5. Depois de configurar o Banco de dados e a caixa de Email's vai ser necessario a execução do código, possuindo duas formas para tal;
	5.1 - PHP local = Caso já tenha o PHP na máquina apenas sera necessário que faça a inicialização do código;
		* Abra o explorador de arquivo;
		* Entre na pasta do TCC onde esta localizado o arquivo 'index.php';
		* Copie o endereço do diretorio;
		* Abra um novo Promt de comando;
		* Execute o comando "cd 'Cole o endereço do diretorio'";
		* Execute o comando a seguir "PHP -S localhost:80";
		* Abra algum navegador na maquina pesquise por 'localhost' na area do URL;

	5.2 - XAMPP = Caso não tenha o PHP na maquina outra alternativa é baixar um software para a inicialização do código;
		* Entre no site "https://www.apachefriends.org/pt_br/index.html";
		* Baixe o instalador do software;
		* Execute o instalador e faça a intalação;
		* Abra o diretorio do XAMPP, entre na pasta 'htdocs' e coloque o arquivo do TCC nesta pasta;
		* Abra o painel de controle do XAMPP, clique na opção 'start' nos modulos 'Apache' e 'MySQL';
		* Abra algum navegador na maquina pesquise por 'localhost' na area do URL;

6. Por fim crie uma conta no site para ter acesso ao sistema principal;