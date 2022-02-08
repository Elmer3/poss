<?php require_once('../../globales_sistema.php');?>
    jQuery.fn.reset = function () {
        $(this).each (function() { this.reset(); });
    }
    
    function insert(){
                var id = $('#id').val();
                
                    var id_venta = $('#id_venta').val();
                    
            var medio = $('#medio').val();
            
            var monto = $('#monto').val();
            
            var moneda = $('#moneda').val();
            
                            var estado_fila = $('#estado_fila').val();
                            
    $.post('ws/venta_medio_pago.php', {op: 'add',id:id,id_venta:id_venta,medio:medio,monto:monto,moneda:moneda,estado_fila:estado_fila}, function(data) {
        if(data === 0){
            $('body,html').animate({
               scrollTop: 0
            }, 800);
            $('#merror').show('fast').delay(4000).hide('fast');
        }
        else{
            $('#frmall').reset();
            $('body,html').animate({
              scrollTop: 0
            }, 800);
            $('#msuccess').show('fast').delay(4000).hide('fast');
            location.reload();
        }
    }, 'json');
    }
    function update(){
                var id = $('#id').val();
                
                    var id_venta = $('#id_venta').val();
                    
            var medio = $('#medio').val();
            
            var monto = $('#monto').val();
            
            var moneda = $('#moneda').val();
            
                            var estado_fila = $('#estado_fila').val();
                            
    $.post('ws/venta_medio_pago.php', {op: 'mod',id:id,id_venta:id_venta,medio:medio,monto:monto,moneda:moneda,estado_fila:estado_fila}, function(data) {
        if(data === 0){
            $('body,html').animate({
               scrollTop: 0
            }, 800);
            $('#merror').show('fast').delay(4000).hide('fast');
        }
        else{
            $('#frmall').reset();
            $('body,html').animate({
              scrollTop: 0
            }, 800);
            $('#msuccess').show('fast').delay(4000).hide('fast');
            location.reload();
        }
    }, 'json');
    }
    function sel(id){
    $.post('ws/venta_medio_pago.php', {op: 'get', id: id}, function(data) {
        if(data !== 0){
    
                $('#id').val(data.id);
                
                    sel_id_venta(data.id_venta.id);
            $('#medio').val(data.medio);
            
            $('#monto').val(data.monto);
            
            $('#moneda').val(data.moneda);
            
                            $('#estado_fila').val(data.estado_fila);
                            
        }
    }, 'json');
    }
    function del(id){
        $.post('ws/venta_medio_pago.php', {op: 'del', id: id}, function(data) {
            if(data === 0){
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                $('#merror').show('fast').delay(4000).hide('fast');
            }
            else{
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                $('#msuccess').show('fast').delay(4000).hide('fast');
                location.reload();
            }
        }, 'json');
    }
    
    $(document).ready(function() {
        var tbl = $('#tb').dataTable();
        tbl.fnSort( [ [0,'desc'] ] );
    
                    $.post('ws/venta.php', {op: 'list'}, function(data) {
                        if(data != 0){
                            $('#data_tbl_modal_id_venta').html('');
                            var ht = '';
                            $.each(data, function(key, value) {
                            ht += '<tr>';
                            ht += '<td><a href="#" onclick="sel_id_venta('+value.id+')">SEL</a></td>';ht += '<td>'+value.id+'</td>';ht += '<td>'+value.subtotal+'</td>';ht += '<td>'+value.total_impuestos+'</td>';ht += '<td>'+value.total+'</td>';ht += '<td>'+value.tipo_comprobante+'</td>';ht += '<td>'+value.fecha_hora+'</td>';ht += '<td>'+value.fecha_cierre+'</td>';ht += '<td>'+value.id_turno.<?php
                            echo $gl_venta_id_turno;
                            ?>+'</td>';ht += '<td>'+value.id_usuario.<?php
                            echo $gl_venta_id_usuario;
                            ?>+'</td>';ht += '<td>'+value.id_caja.<?php
                            echo $gl_venta_id_caja;
                            ?>+'</td>';ht += '<td>'+value.id_cliente.<?php
                            echo $gl_venta_id_cliente;
                            ?>+'</td>';
                            ht += '</tr>';
                            });
                            $('#data_tbl_modal_id_venta').html(ht);
                            $('#tbl_modal_id_venta').dataTable();
                        }
                    }, 'json');
    });
    
    function save(){
        var vid = $('#id').val();
        if(vid === '0')
        {
            insert();
        }
        else
        {
            update();
        }
    }
    
                    function sel_id_venta(id_e){
                        $.post('ws/venta.php', {op: 'get', id:id_e}, function(data) {
                        if(data != 0){
                            $('#id_venta').val(data.id);
                            $('#txt_id_venta').html(data.<?php
                            echo $gl_venta_medio_pago_id_venta;
                            ?>);
                            $('#modal_id_venta').modal('hide');
                          }
                        }, 'json');
                    }