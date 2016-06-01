<script type="text/javascript">
    $(document).ready(function(){
        $('#form_mercadoria').validate({
            rules: {
                codMercadoria: {
                    required: true,
                    minlength: 3
                },
                tipoMercadoria: {
                    required: true,
                },
                nomeMercadoria: {
                    required: true
                },
				qteMercadoria: {
					required: true
				},
				precoMercadoria: {
					required: true
				},
				tipoNegocio: {
					required: true
				}
                
            },
            messages: {
                codMercadoria: {
                    required: "O campo codigo da Mercadoria é obrigatório.",
                    minlength: "O campo codigo da Mercadoria deve conter no mínimo 3 caracteres."
                },
                tipoMercadoria: {
                    required: "O campo Tipo da Mercadoria é obrigatório.",
                },
                nomeMercadoria: {
                    required: "O campo Nome da Mercadoria é obrigatório."
                },
				qteMercadoria: {
					required: "O campo quantidade é obrigatório"
				},
				precoMercadoria: {
					required: "O campo preço é obrigatório"
				},
				tipoNegocio: {
					required: "O campo tipo do negocio é obrigatório"
				}
                
            }
 
        });
    });
</script>