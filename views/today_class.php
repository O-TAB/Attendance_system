<?php ?>
<!-- precisa dos valores turmas e outros-->

<div class="card p-4 shadow-sm mb-4">
    <h5 class="mb-3">Aulas de hoje</h5>
    <div class="table-responsive">
        <?php if (!empty($turmas)): ?>
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Data</th>
                        <th>Dia</th>
                        <th>Modalidade</th>
                        <th>Horario</th>
                        <th>Ações</th>
                    </tr>
                </thead>
    
                <tbody >
                    <?php
                        //loop para dados
                        foreach ($turmas as $turma) {
                            echo "<tr>";
                            
                            if (in_array($turma['id'], $ocorrencias)) {
                                $indice = array_search($turma['id'], $ocorrencias);
                                
                                if ($indice !== false) {
                                    $id_aula = $aulas[$indice]['id'];
                                    $button = '<a href="visualizar_chamadas.php" class="btn btn-info btn-sm">Realizada</a>';
                                }
                            } else {
                                $button = '<a href="chamada.php?id_turma=' . htmlspecialchars($turma['id']) . '" class="btn btn-sm btn-success">Registrar Chamada</a>';
                            }
                            
                            // Imprime cada célula da linha
                            echo '<td>' . htmlspecialchars($data) . '</td>';
                            echo '<td>' . htmlspecialchars($turma['dia_sem']) . '</td>';
                            echo '<td>' . 'modalidades' . '</td>';
                            echo '<td>' . htmlspecialchars($turma['horario']) . '</td>';
                            echo '<td>' . $button . '</td>';
                            
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
                
        <?php else: ?>
            <div class='alert alert-warning'>Nenhuma aula programada para hoje.</div>
        <?php endif?>
            
        
    </div>
</div>



