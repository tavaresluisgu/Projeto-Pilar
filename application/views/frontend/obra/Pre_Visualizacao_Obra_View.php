<div class="container">
    <div class="row">
        <div class="col-sm-offset-10">
            <!-- Código que leva para o form de cadasttro de obra -->
            <a id="cadastrar_obra" class="btn btn-default" type="button" href= "<?php echo base_url('Obra_Controller/cadastrar_obra') ?>" >Cadastrar Obra</a>
        </div>
    </div>
    <div class="row text-center">
        <h1> Obras registradas </h1>
    </div>
</div><br>

<div class="container">
    <!-- Lista todas as obras registradas no banco de dados -->
    <?php
    foreach ($obras as $obra){ ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> <?php echo $obra->nome_objeto ?> </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <p class="card-text">
                                <b> Título: </b><?php echo $obra->titulo ?>
                            </p>
                            <p class="card-text" >                            
                                <b>Número atual: </b>
                                <?php echo $obra->num_atual ?><br>
                            </p>
                            <p class="card-text" > <b> Descrição do Objeto: </b> </p>
                            <p class="text-preview" >                            
                                <?php echo $obra->descricao_objeto ?><br>
                            </p>  
                        </div>

                        <!-- Verifica qual é a imagem padrão da obra atual -->
                        <?php
                        if($obra->imagem == 1){ ?>
                            <?php $semImgpadrao = 1; ?>
                            <!-- Pesquisa a imagem padrão desta obra -->
                            <?php foreach($imgs as $img){

                                if($obra->id_obra == $img->id_obra && $img->img_padrao == 1){
                                    $semImgpadrao = 0;
                                    $source = $img->caminho_img . $img->id_img . '.' . $img->extensao;
                                    ?>
                                    <div class="col-sm-2 col-md-2 col-lg-6">
                                        <img src="<?php echo base_url($source);?>" alt="imagem_padrao" class="img-fluid" height=250px width="500" class="pre_view_img">
                                    </div>
                                <?php
                                }?>
                            <?php
                            }?>

                            <!-- Se nenhuma das fotos da obra for uma imagem padrão renderiza a imagem default -->
                            <?php
                            if($semImgpadrao){?>
                                <div class="col-sm-2 col-md-2 col-lg-6">
                                    <img src="<?php echo base_url('/assets/img/obra_default.jpg');?>" class="img-fluid" width=500px>
                                </div>
                            <?php
                            }?>
                        <?php
                        }
                        else{?>
                            <!-- Caso a obra nao possua imagens, carrega a imagem padrão -->
                            <div class="col-sm-2 col-md-2 col-lg-6">
                                <img src="<?php echo base_url('/assets/img/obra_default.jpg');?>" class="img-fluid" width=500px>
                            </div>
                        <?php
                        }?>

                    </div>
                    <div class="card-footer text-muted text-center">
                        <!-- Passa o id_obra para o form que será usado lá no controller para realizar a busca no BD
                         via GET-->
                        <?php echo form_open('Obra_Controller/pesquisar_obra/'.$obra->id_obra); ?>
                            <button id="visualizar_registro" class="btn btn-default" type="submit" name="txt-visualizar" value=""> Visualizar Registro </button>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <?php
    }?>
</div>        
<br>   