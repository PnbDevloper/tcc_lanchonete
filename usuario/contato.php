  <!-- Start Contact info -->
  
 <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    /*  mapa */
    #map {
      height: 400px;
      width: 100%;
    }
      #map-container {
    padding-top: 60px; 
  }

    /* informações */
    .info-section {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .info-box {
      width: 48%;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <!-- Mapa -->
      <div class="col-md-6 mt-3" id="map-container">
  <div id="map">


        </div>
      </div>

      <!-- Formulario -->
      <div class="col-md-6 mt-3">
        <form class="row g-3" action="contato.php">
          <div class="col-sm-12">
            <label for="fname" class="form-label">Nome:</label>
            <input type="text" id="fname" name="nome" class="form-control">
          </div>
             <div class="col-sm-12">
            <label for="fname" class="form-label">Email:</label>
            <input type="email" id="fname" name="email" class="form-control">
          </div>
                      <div class="col-sm-12">
            <label for="fname" class="form-label">Numero de telefone:</label>
            <input type="text" id="fname" name="numero" class="form-control">
          </div>
          
          <div class="col-sm-12">
            <label for="text" class="form-label">Mensagem:</label><br>
            <textarea id="mensagem" name="mensagem" class="msg form-control"></textarea>
          </div>
          <div class="col-12"> <br>
            <input type="submit" class="btn btn-primary" name="Enviar" value="Enviar">
          </div>
        </form>
      </div>
    </div>

    <?php
      require_once "conexao.php";
      if (isset($_REQUEST["Enviar"])) {
        try {
        $nome = $_REQUEST['nome'];
        $email = $_REQUEST['email'];
        $numero = $_REQUEST['numero'];
        $mensagem = $_REQUEST['mensagem'];

        $sql = $conn->prepare("INSERT INTO tbl_contatos (id, nome, email, numero, mensagem)
                              VALUES (:id, :nome, :email, :numero, :mensagem)");

        $sql->bindValue('id', null);
        $sql->bindValue('nome', $nome);
        $sql->bindValue('email', $email);
        $sql->bindValue('numero', $numero);
        $sql->bindValue('mensagem', $mensagem);

        $sql->execute();

        echo "<script language=javascript>
        alert('Foi enviada com Sucesso !!!');
        location.href = 'index.php';
        </script>";
        }
        catch (PDOException $erro) {
          echo $erro->getMessage();
        }
      }

      $conn = null
    ?>

    <!-- Informações de contato e horário -->
    <div class="info-section">
      <div class="info-box">
        <h3>Contatos</h3>
        <p class="lead"><b>Rua jordao da norte, 12, São Paulo, SP</b></p> 
        <p class="lead"><b>(19) 3608-0000</b></p> 
      </div>
      <div class="info-box">
        <h3>Horário de Funcionamento</h3>
        <p><span class="text-color"><b>Segunda-feira:</span> 17:00 - 01:00h</b></p>
        <p><span class="text-color"><b>Terça-feira:</span> 17:00 - 01:00h</b></p>
        <p><span class="text-color"><b>Quarta-feira:</span> 17:00 - 01:00h</b></p>
        <p><span class="text-color"><b>Quinta-feira:</span> 17:00 - 01:00h</b></p>
        <p><span class="text-color"><b>Sexta-feira:</span> 17:00 - 01:00h</b></p>
        <p><span class="text-color"><b>Sábado e Domingo:</span> 17:00 - 01:00h</b></p> 
        


  <!-- Leaflet.js -->
  <script src="https://unpkg.com/leaflet"></script>
  <script>
    const map = L.map('map').setView([-21.5908, -46.8914], 16); // Define a localização e o zoom
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([-21.59895366385854, -46.89095369679086]).addTo(map)
      .bindPopup('Hora do Lanche, São José do Rio Pardo')
      .openPopup();
  </script>

      </div>
    </div>
  </div>
