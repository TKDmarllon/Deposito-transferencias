## Instalação



## Account

Api destinada ao controle de clientes

* Methods usados
POST | GET | PUT | DELETE

 * Function index <br>
        Method:GET <br>
                 <i>Retorna todas as condas existentes<i>
    
                     url:api/conta/home
 <br>
 <br>
    
  * Function store <br>
        Method: POST <br>
        <i>Cria uma nova conta<i>
           
                    url:api/conta/cadastro
                    
 Body Params:

Devem ser enviados em formato JSON.

fullname=[string] - Nome do cliente, required - precisa ter ao menos 2 palavras

email=[string] - Email, required, unico no BD, rule:email

type=[string] - cpf ou cnpj, required

document(string] - 11 caracteres numerios caso type seja cpf e 14 caracteres numericos caso seja cnpj, requid, unico no BD

password(string) - required, minimo de 8 digitos

password_confirmation - required,
<br>
<br>
            
   * Function show <br>
        Method:GEt <br>
        <i>Retorna os dados de uma id<i>
        
                    url:api/conta/{id}           
<br>
<br>
            
  * Function update <br>
        Method:PUT <br>
        <i>Atualiza dados da conta (fullname, password)<i>
            
                    url:api/conta/atualizar
     
      Body Params:

Devem ser enviados em formato JSON.
 
 fullname=[string] - Nome do cliente, required - precisa ter ao menos 2 palavras
 password(string) - required, minimo de 8 digitos
      
   <br>
   <br>
   
  * Function destroy <br>
        Method:DELETE <br>
        <i>Deleta a conta referente ao id<i>
        
                    url:api/conta/{id}
        
  <br>
  <br>

## Balance

  Api destinada ao controle das transações bancarias (deposito e transferência)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
