# Configuração do Projeto RentCar

# command
docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' banco-mysql

## 1. Configuração do VirtualHost no WSL (Ubuntu)

    Para rodar o projeto com o domínio personalizado (`rentcar.local`) dentro do WSL, siga os passos abaixo.

### Passo 1: Configuração do VirtualHost

1. **Crie um arquivo de configuração do Apache:**

   Navegue até o diretório do Apache:
   ```bash
   sudo nano /etc/apache2/sites-available/rentcar.conf
   ```

2. **Adicione a configuração do VirtualHost:**

    No arquivo rentcar.conf, adicione o seguinte conteúdo:
	```
	<VirtualHost *:80>
		ServerName rentcar.local
		DocumentRoot /var/www/html/workspace/rentcar/public

		<Directory /var/www/html/workspace/rentcar/public>
			AllowOverride All
			Require all granted
		</Directory>

		ErrorLog ${APACHE_LOG_DIR}/rentcar_error.log
		CustomLog ${APACHE_LOG_DIR}/rentcar_access.log combined
	</VirtualHost>
	```

3. **Habilite o site e reinicie o Apache:**
	```bash
	sudo a2ensite rentcar.conf
	sudo systemctl reload apache2
    ```
	
### Passo 2: Descobrir o IP da sua WSL

1. **No terminal da WSL, execute o comando:**
	```bash
	ip addr show eth0
    ```

Esse será o IP da sua WSL.

### Passo 3: Editar o arquivo hosts no Windows
1. **Abra o arquivo hosts no Windows:**

	```bash
	Local: C:\Windows\System32\drivers\etc\hosts
    ```

2. **Adicione a linha apontando para o IP da WSL:**

    No final do arquivo, adicione a seguinte linha (substitua o IP pelo IP que você encontrou no passo anterior):
	```bash
	<Seu IP capturado no passo 3 item 1> rentcar.local
    ```
    Salve o arquivo.

### Passo 4: Acesse o projeto no navegador
    Agora, você pode acessar o projeto no navegador Windows utilizando o domínio personalizado:
	```bash
	http://rentcar.local
    ```

## 2. Alternativa: Usando o PHP Embutido (php -S)
    Se você preferir não configurar o Apache ou estiver com problemas de configuração, pode rodar o projeto diretamente usando o servidor embutido do PHP.

### Passo 1: Navegar até o diretório public
    No terminal da WSL, navegue até a pasta public do seu projeto:
	```bash
	cd /var/www/html/workspace/rentcar/public
    ```

### Passo 2: Rodar o servidor PHP embutido
    Execute o seguinte comando:
	```bash
	php -S 127.0.0.1:8080
    ```
	
    Isso irá rodar o servidor localmente na URL:
    http://127.0.0.1:8080

