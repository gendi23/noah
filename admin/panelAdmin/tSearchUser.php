<style>
    .block{
        width: 50%;
        border: solid blue;
        height: 300px;
        position: relative;
        top: 10px;
    }
    .block h4{
        color: #215bbd;
        background-color: #cfcfcf;
        top: 0;
        margin-top: 0;
        padding: 10px;
        font-weight: bold;
    }
    #search{
        left: 0;
    }#restore{
        left: 50%;
        top: -290px;
         }
    .photo{
        background-color: #f0f0f0 !important;
        border: #23ffca 2px solid !important;
        margin: -5px;
        color: black;
        padding: 3px 19px;
        border-radius: 4px;
    }
    #search-button{
        top: 14px;
        position: relative;
        left: 50px;
    }
    #form-user{
        margin-top: 30px;
        padding: 5px 10px;
    }
    #search>div.form-group{
        margin-top: 25px;
    }
    p#message{
        position: relative;
        top: -278px;
        width: 700px;
        color: red;
        text-align: center;
        font-size: 14pt;
    }
</style>
<h3 class="text-center">BUSCADOR DE USUARIOS PARA REESTABLECER DATOS Y CONTRASEÑA</h3>

<div class="block" id="search">
    <h4 class="text-center">Busqueda de Usuario</h4>
    <div class="form-group">
        <label class="control-label col-sm-5" for="user-login">Usuario</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="user-login" name="user" value="" required="">
        </div>
    </div>
    <a href="#" class="photo" id="search-button">Buscar</a>
    <form  class="form-horizontal" role="form" method="post" id="form-user" name="form">
        <div class="form-group">
            <label class="control-label col-sm-5" for="pass">Contraseña</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="pass" name="pass" disabled >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="cel">Telefono Celular</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="cel" name="cel" disabled>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="email">Correo GMAIL</label>
            <div class="col-sm-7">
                <input type="email" class="form-control" id="email" name="email" disabled >
            </div>
        </div>

    </form>

</div>
<div class="block" id="restore">
    <h4 class="text-center">Reestablecer datos</h4>
    <form action="/panel/user/update" class="form-horizontal" role="form" method="post" id="form-user"  name="form">
        <input type="hidden" name="userId" id="userId"/>
        <div class="form-group">
            <label class="control-label col-sm-5" for="pass">Nueva <br/>Contraseña</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" id="passReset" name="passReset"  >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="cel">Nuevo <br/>Telefono Celular</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="celReset" name="celReset" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-5" for="email">Nuevo <br></Nuevobr>Correo GMAIL</label>
            <div class="col-sm-7">
                <input type="email" class="form-control" id="emailReset" name="emailReset"  >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-default buttonForm" id="button-login">Aceptar</button>
            </div>
        </div>
    </form>
</div>
<center><p id="message">
    Luego que la empresa haga el cambio de la contraseña el usuario deberá entrar a la cuenta para cambiar datos como: Nombre, Apellido, Cedula y Datos Bancarios
</p></center>
<script src="/front/js/jquery.js"></script>
<script>
    $(document).ready(function(){
       $("#search-button").click(function(e){
           e.preventDefault();
            var user= $("#user-login").val();

           $.ajax({
               cache:false,
               dataType: "json",
               type : 'GET',
               url: "/panel/json/"+user,
               success: function(data) {
                   console.log(data.Userpass);
                    $("#pass").val(data.pass);
                    $("#email").val(data.email);
                    $("#cel").val(data.phone);
                    $("#userId").val(data.id);
               },
               error:function(){
                  console.log("Ourrió un error al cargar el módulo");
               }
           });
       });
    });
</script>