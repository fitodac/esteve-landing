<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import Cookies from "js-cookie";

const setSpecialistCookie = () => {
	Cookies.set('specialist', 'true', { expires: 365 });
};
</script>

<template>
	<div class="bg-black bg-opacity-80 flex items-center inset-0 fixed z-50">
		<div class="bg-brand-green w-full px-6 py-10 3xl:px-0">
			<div class="max-w-4xl mx-auto text-white text-center">

				<h3 class="text-2xl leading-none font-bold md:text-3xl md:leading-none">¡Bienvenido a la iniciativa <br>Colesterol Challenge!</h3>

				<div class="text-sm space-y-5 mt-5">
					<p>Área de acceso restringido: Esta área contiene información dirigida a profesionales sanitarios facultados para prescribir o dispensar medicamentos en España (requiere una formación especializada para su correcta interpretación).</p>
					<p>No está permitido utilizar, compartir ni difundir contenidos que pudieran construir directa o indirectamente promoción de medicamentos de prescripción reproducidos en esta web a través de redes sociales y otros canales, soportes o medios abiertos al público en general. El uso de los contenidos de <Link href="https://colesterolchallenge.com/" class="underline">https://colesterolchallenge.com/</Link> requiere de la autorización previa de ESTEVE.</p>
				</div>


				<div class="space-y-3 mt-5 align-top sm:space-x-7 sm:space-y-0 sm:mt-10">
					<Link 
						class="bg-brand-orange text-xs uppercase leading-none font-semibold h-12 px-4 flex justify-center items-center rounded transition-all select-none hover:opacity-90 sm:w-60 sm:inline-flex" 
						@click="setSpecialistCookie">
						Confirmo que<br>soy profesional sanitario
					</Link>

					<Link
						class="bg-gray-500 text-xs uppercase leading-none font-semibold h-12 px-4 flex justify-center items-center rounded transition-all select-none hover:opacity-90 sm:w-60 sm:inline-flex"
						href="https://www.esteve.com/es/pacientes/sistema-nervioso-central">
						No soy profesional<br> sanitario
					</Link>
				</div>

			</div>
		</div>
	</div>
</template>