
                <?php
                try {
                  $consulta = $conn->prepare("SELECT * FROM tbl_produtos");
                  $consulta->execute();

                  while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>


				            <div class="col-lg-4 col-md-6 special-grid">
                      <div class="gallery-single fix">
                        <img src="<?php echo $row["produtoimg"] ?>" class="img-fluid" alt="Image">
                        <div class="why-text">
                          <h4><?php echo $row["produto"] ?></h4>
                          <p><?php echo $row["descricao"] ?></p>
                          <h5><?php echo $row["preco"] ?></h5>
                        </div>
                      </div>
                    </div>
                <?php
                  }
                } catch (PDOException $erro) {
                  echo $erro->getMessage();
                }
                ?>
