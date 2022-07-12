<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Projeto ainda em desenvolvimento!

<p><a href="#config"># Configuração Inicial do Projeto</a></p>
<p><a href="#restante"># O que falta para finalizar</a></p>

<hr>
<p id="config">

## Configurando o Projeto ...
 
        composer install --no-scripts
     
#Copie o arquivo .env.example

        cp .env.example .env

#Crie uma key para o projeto

        php artisan key:generate

#Configurar o arquivo .env com base no seu Banco de Dados e SMTP para recuperação de senhas 

#Execute as migrations

        php artisan migrate --seed

</p> 
<hr>
<p id="restante">

## O que falta:

#Pesquisar despesas pela barra no navbar

#Trocar formar de editar de modal para input hidden

#Criar rotas de edit/show para despesas

#Trocar logo pelo painel de configurações

#Adicionar filtro de despesas

#Adicionar input para pesquisar despesas

#Finalizar a organização do dashboard

</p>
     
<hr>


