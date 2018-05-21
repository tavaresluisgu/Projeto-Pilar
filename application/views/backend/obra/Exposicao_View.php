<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<h1> Exposições </h1>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <!--  Botão para voltar para a pré-visualização  -->
            <?php echo form_open('Obra_Controller/pesquisar_obra/'.$id_obra); ?>
                <button class="btn btn-default" type="submit"> Voltar </button>
            <?php echo form_close();?>
            <!--  FIM  -->
        </div>

        <div class="col-sm-offset-10">
            <!-- Botão que direciona para a página de cadastro de exposição -->
            <?php echo form_open('Obra_Controller/cadastrar_exposicao/'.$id_obra); ?>
                <button style="width: 200px" class="btn btn-default" type="submit"> Cadastrar Exposição </button>
            <?php echo form_close();?>
            <!-- FIM -->
        </div>
    </div>
</div>

<div class="container text-center">
    <!-- Lista todas as obras registradas no banco de dados -->
    <?php
        foreach ($exposicoes as $exposicao){ ?>
    <div class="row">
        <div class="col-sm-offset-2">
            <div class="card" style="width: 75rem">
                <div class="card-header">
                    <h4> Nome da exposição: <?php echo $exposicao->nome_exposicao?> </h4>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <div class="col-sm-6">
                            ID da exposição: <?php echo $exposicao->id_exposicao ?><br>
                            Descrição da exposição: <?php echo $exposicao->descricao?><br>
                        </div>
                        <div class="col-sm-6">
                            Local da exposição: <?php echo $exposicao->local_realizacao?><br>
                            Data de início da exposição: <?php echo $exposicao->data_inicio?><br>
                            Data de término da exposição: <?php echo $exposicao->data_fim?><br>
                        </div> 
                    </p>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- Botão para atualizar uma exposição -->
                            <?php echo form_open('Obra_Controller/atualizar_exposicao/'.$id_obra.'/'.$exposicao->id_exposicao); ?>
                                <!-- <input  type="hidden" name="txt-id-exp" value="<?php echo $exposicao->id_exposicao ?>"/> -->
                                <!-- <input  type="hidden" name="txt-id-obra" value="<?php echo $exposicao->id_obra ?>"/> -->
                                <button style="width: 200px" class="btn btn-default" type="submit" name="txt-visualizar" value=""> Atualizar </button>
                            <?php echo form_close();?>
                            <!-- FIM -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Botão de exclusão que chama um modal para verificar se o usuário deseja mesmo excluir a obra-->
                            <button style="width: 200px" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">Excluir</button>

                            <!-- Modal de exclusão de obra -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tem certeza que deseja excluir a exposicão?</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="col-md-2">
                                                <!-- Botão para excluir uma exposição -->
                                                <?php echo form_open('Obra_Controller/excluir_exposicao/'.$exposicao->id_obra.'/'.$exposicao->id_exposicao); ?>
                                                    <button class="btn btn-default" type="submit" name="txt-visualizar" class="btn btn-secondary" value=""> Sim </button>
                                                <?php echo form_close();?>
                                                <!-- FIM -->
                                            </div>
                                            <div class="col-md-offset-4">
                                                <button class="btn btn-default" type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim modal de exclusão de obra -->  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }?>
</div>
