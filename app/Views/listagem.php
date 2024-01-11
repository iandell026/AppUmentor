<!doctype html>
<html lang="en">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Controle de Usuários uMentor!</title>
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Controle de Usuários uMentor</h1>
        <div class="row">
            <div class="col-sm-12 mt-5 mb-3">
            <h3>Lista de Usuários</h3>
            <div id="dadosCadastro">
              <form id="formUsuario">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="dataAdmissao" class="form-label">Data de Admissão</label>
                        <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao">
                    </div>
                </div>
              </form>
              <button type="button" class="btn btn-primary mb-2" id="AddUsuario">Adicionar Usuário</button>
            </div>

            </div>
              <div class="table table-responsive">
                  <table class="table table-hover table-bordered" id="tabelaUsuarios">
                    <thead class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Admissão</th>
                        <th>Data de Inserção</th>
                        <th>Data de Atualização</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($dados as $k): ?>
                      <tr>
                        <td><?= $k->ID ?></td>
                        <td><?= $k->Nome ?></td>
                        <td><?= $k->Email ?></td>
                        <td><?= $k->DataAdmissao ?></td>
                        <td><?= isset($k->CriadoEm) ? $k->CriadoEm : '-' ?></td>
                        <td><?= isset($k->AtualizadoEm) ? $k->AtualizadoEm : '-' ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    
  </body>
</html>

<script>
  
  $("#formUsuario").validate({
    rules: {
        nome: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        email: {
          required: true,
          email: true
        },
        dataAdmissao: {
          required: true,
          date: true
        }
    },
    messages: {
        nome: {
          required: "Por favor, informe o nome",
          minlength: "O nome deve ter pelo menos 3 caracteres",
          maxlength: "O nome não deve ter mais de 50 caracteres"
        },
        email: {
          required: "Por favor, informe o email",
          email: "Por favor, informe um email válido"
        },
        dataAdmissao: {
          required: "Por favor, informe a data de admissão",
          date: "Por favor, informe uma data válida"
        }
    },

    // Estilização das validações com SweetAlert2

    errorPlacement: function(error, element) {
      // Remove qualquer alerta existente antes de exibir um novo
      Swal.close();

      Swal.fire({
          title: 'Erro de Validação',
          text: error.text(),
          icon: 'error',
          confirmButtonText: 'Ok'
      });
    },
    highlight: function(element, errorClass, validClass) {
      // Adiciona classe de erro ao elemento do formulário
      $(element).addClass("is-invalid");
    },
    unhighlight: function(element, errorClass, validClass) {
      // Remove classe de erro do elemento do formulário
      $(element).removeClass("is-invalid");
    },

    // Desativa a validação automática
    onfocusout: false,
    onkeyup: false,
    onclick: false
  });

  function atualizarTabela(id) {
    $.ajax({
      url: '<?php echo base_url().'listarPorId/' ?>' + id,
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        let dados = response[0];

        // Adiciona os novos dados à tabela
        $('#tabelaUsuarios tbody').append('<tr><td>' + dados.ID + '</td><td>' + dados.Nome + '</td><td>' + dados.Email + '</td><td>' + dados.DataAdmissao + '</td><td>' + dados.CriadoEm + '</td><td>' + '-');
      }
    });
  }

  $(document).ready(function() {
    $('#AddUsuario').click(function() {

      if ($("#formUsuario").valid()) {

        let nomeUsuario = $('#nome').val();
        let emailUsuario = $('#email').val();
        let dataAdmissaoUsuario = $('#dataAdmissao').val();

        let dados = {
          Nome: nomeUsuario,
          Email: emailUsuario,
          DataAdmissao: dataAdmissaoUsuario
        };

        let url = '<?php echo base_url().'inserir' ?>';
        
        $.ajax({
          url: url,
          method: 'POST',
          data: dados,
          success: function(response) {

            let msg = response['mensagem'];

            if(response['sucesso'] == true){

              Swal.fire({
                title: "Sucesso!",
                text: msg,
                icon: "success"
              });

              let id = response['id'];

              // Atualiza a tabela com o registro inserido
              atualizarTabela(id);

              // Limpa os campos do formulário
              $("#formUsuario")[0].reset();

            }else{
              
              Swal.fire({
                title: "Falha!",
                text: msg,
                icon: "error"
              });
            }

          },
          error: function (xhr) {

            Swal.fire({
              title: "Erro na requisição Ajax!",
              text: xhr.status + " " + xhr.statusText,
              icon: "error"
            });

          }
        });
      }
      
    });
  });

</script>