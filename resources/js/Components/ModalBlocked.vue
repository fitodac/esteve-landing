<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Cookies from "js-cookie";

const setSpecialistCookie = () => {
    Cookies.set('specialist', 'true', { expires: 365 });
};
</script>

<template>
	<div class="modal">
		<div class="modal-container">
			<div class="container global">

				<h3>¡Bienvenido a Hablemos de Psiquiatría Legal!</h3>

				<div class="content">
                    <p><strong>Área de acceso restringido:</strong> esta área contiene información dirigida exclusivamente a profesionales sanitarios facultados para prescribir o dispensar medicamentos en España (requiere una formación especializada para su correcta interpretación).</p><br>
                    <p>No está permitido utilizar, compartir ni difundir contenidos que pudieran constituir directa o indirectamente promoción de medicamentos de prescripción reproducidos en esta web a través de redes sociales u otros canales, soportes o medios abiertos al público en general. El uso de los contenidos de https://estevepsiquiatrialegal.es/ requiere de la autorización previa de ESTEVE.</p>

                </div>


				<div class="grid justify-center gap-6
										max-w-3xl mx-auto mt-10 md:flex">
					<div class="flex-1">
						<Link
							class="btn-proceed"
                            @click="setSpecialistCookie"
                        >
							Confirmo que<br>soy profesional sanitario
						</Link>
					</div>

					<div class="flex-1">
						<a
							href="https://www.esteve.com/es/pacientes/sistema-nervioso-central"
							class="btn-reject">
							No soy profesional sanitario
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</template>


<style lang="scss" scoped>
.modal{
	@apply bg-black bg-opacity-60 backdrop-blur-sm
					inset-0 fixed grid items-center select-none z-50;
}

.modal-container{
	@apply bg-brand-blue text-white text-center
					w-full px-6 py-14 xl:px-0;
}

h3{
	@apply text-3xl leading-none
					md:text-4xl lg:text-5xl;
}

.content{
	@apply mt-8;
}

.btn-proceed{
	@apply bg-brand-pink text-white
					text-lg leading-tight text-center uppercase
					h-full px-10 py-3
					flex justify-center items-center
					rounded-lg select-none transition-all
					hover:opacity-80;
}

.btn-reject{
	@apply bg-gray-400 text-white
					text-lg leading-tight text-center uppercase
					h-full px-10 py-3
					flex justify-center items-center
					rounded-lg select-none transition-all
					hover:opacity-80;
}
</style>
