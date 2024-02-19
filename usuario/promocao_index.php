
                <?php
                try {
                  $consulta = $conn->prepare("SELECT * FROM tbl_promocao");
                  $consulta->execute();

                  while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>

				          <div class="col-sm-12 col-md-4 col-lg-4">
                          <a class="lightbox" href="<?php echo $row["arquivo"] ?>">
                            <img class="img-fluid" src="<?php echo $row["arquivo"] ?>" alt="Gallery Images">
                          </a>
                  </div>
                <?php
                  }
                } catch (PDOException $erro) {
                  echo $erro->getMessage();
                }
                ?>


