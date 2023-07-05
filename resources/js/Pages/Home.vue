<script setup>
import PageLayout from '@/Layouts/PageLayout.vue'
import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'
import { Link, usePage } from '@inertiajs/inertia-vue3'

const store = useStore()
const { user } = storeToRefs(store)

</script>

<template>
<PageLayout>

<div id="en-que-consiste" class=""/>

<section id="hero" class="bg-brand-green bg-[url('img/hero-bg.jpeg')] bg-cover  bg-right-top text-white px-6 py-10 md:py-20 3xl:px-0">
	<div class="max-w-5xl mx-auto">
		<div class="grid gap-6 md:grid-cols-12 md:items-center">

			<div class="text-center order-2 md:col-span-7">
				<img src="img/brand-challenge.svg" alt="Colesterol challenge" class="w-48 inline-block sm:w-60 md:w-72">
				<h2 class="text-3xl leading-none font-bold font-ropa mt-5">¿Cuánto sabes sobre el colesterol?</h2>
				<h3 class="text-2xl leading-none font-ropa font-light mt-1">¡Pon a prueba tu conocimiento y gana!</h3>
				<p class="leading-tight font-semibold text-sm mt-2">una iniciativa de <img src="img/esteve-white.svg" alt="Esteve" class="w-16 mx-1 inline"> con la colaboración del Dr. Vicente Pascual</p>
			</div>

			<div class="flex justify-center md:order-2 md:col-span-5">
				<div>
					<img src="img/hero-pic.png" alt="Imagen de símbolos de interrogación" class="w-14 h-auto md:w-10/12">
				</div>
			</div>

		</div>
	</div>
</section>



<div id="challenges" class=""/>

<section class="px-6 3xl:px-0">
	<div class="max-w-5xl mx-auto">

		<div class="text-center relative pl-28 py-16 select-none grid justify-center md:pl-0">
			<h3 class="text-brand-green text-3xl font-ropa font-bold sm:text-4xl sm:leading-tight md:text-5xl md:leading-tight">3 CHALLENGES</h3>
			<h4 class="leading-tight font-bold md:max-w-lg md:text-xl md:leading-tight lg:max-w-full">8 preguntas cada uno con 4 posibles respuestas y solo 1 correcta</h4>

			<div class="bg-brand-green text-white text-xs leading-tight font-ropa font-semibold text-center w-28 h-28 p-3 grid place-content-center -left-3 top-12 absolute select-none rounded-full -rotate-12 md:text-sm md:w-36 md:h-36 lg:left-10">PUEDES GANAR UNA INSCRIPCIÓN AL CONGRESO SEMERGEN 2023</div>
		</div>


		<div class="max-w-xs mx-auto grid gap-4 md:grid-cols-3 md:max-w-full md:pt-10">
			<div class="">
				<div class="bg-brand-green text-white h-full flex flex-col rounded-lg">
					<div class="px-4 pt-6 pb-3 flex justify-center items-center gap-3 lg:pb-5">
						<span class="text-5xl font-ropa leading-none font-semibold md:text-7xl">1</span>
						<img src="img/challenge-1.svg" alt="Icono del challenge 1" class="w-10 md:w-16">
					</div>

					<div class="leading-tight text-center font-semibold h-full px-4">Recomendaciones actuales en el control de la hipercolesterolemia y del riesgo cardiovascular</div>

					<div class="px-4 pt-5 pb-8 flex justify-center lg:pt-8">
						<Link href="#" class="bg-white text-brand-orange text-sm font-bold px-5 py-3 rounded transition-all will-change-auto hover:opacity-90 lg:px-6 lg:py-3.5">Participar</Link>
					</div>
				</div>
			</div>

			<div class="">
				<div class="bg-brand-green-400 text-white h-full flex flex-col rounded-lg">
					<div class="px-4 pt-6 pb-3 flex justify-center items-center gap-3 lg:pb-5">
						<span class="text-5xl font-ropa leading-none font-semibold md:text-7xl">2</span>
						<img src="img/challenge-2.svg" alt="Icono del challenge 2" class="w-10 md:w-16">
					</div>

					<div class="leading-tight text-center font-semibold h-full px-4">Recomendaciones y medidas dietéticas</div>

					<div class="px-4 pt-5 pb-8 flex justify-center lg:pt-8">
						<Link href="#" class="bg-white text-brand-orange text-sm font-bold px-5 py-3 rounded transition-all will-change-auto hover:opacity-90 lg:px-6 lg:py-3.5">Participar</Link>
					</div>
				</div>
			</div>

			<div class="">
				<div class="bg-brand-orange text-white h-full flex flex-col rounded-lg">
					<div class="px-4 pt-6 pb-3 flex justify-center items-center gap-3 lg:pb-5">
						<span class="text-5xl font-ropa leading-none font-semibold md:text-7xl">3</span>
						<img src="img/challenge-3.svg" alt="Icono del challenge 3" class="w-10 md:w-16">
					</div>

					<div class="leading-tight text-center font-semibold h-full px-4">Nutracéuticos para el control de la hipercoletrolemia</div>

					<div class="px-4 pt-5 pb-8 flex justify-center lg:pt-8">
						<Link href="#" class="bg-white text-brand-orange text-sm font-bold px-5 py-3 rounded transition-all will-change-auto hover:opacity-90 lg:px-6 lg:py-3.5">Participar</Link>
					</div>
				</div>
			</div>
		</div>

		<div class="h-16 md:h-20"></div>

	</div>
</section>


<section class="px-6 pb-6 3xl:px-0">
	<div class="max-w-5xl mx-auto">

		<div class="bg-brand-green-100 text-brand-green text-3xl font-ropa font-extrabold leading-none text-center p-3 rounded-lg md:text-5xl md:leading-none">¡A TU RITMO!</div>

		<div class="text-xl font-ropa font-light leading-none text-center mt-4 md:text-2xl">¡TIENES HASTA EL 30 DE SEPTIEMBRE PARA COMPLETAR LOS CHALLENGES!</div>
	</div>
</section>



<div id="bibliografia" class=""/>

<section class="bg-brand-green bg-[url('img/hero-bg.jpeg')] bg-cover bg-right-top text-white px-6 py-16 3xl:px-0">
	<div class="max-w-5xl mx-auto">
		<h3 class="text-2xl font-ropa font-bold text-center md:text-4xl">BIBLIOGRAFÍA</h3>

		<div class="grid gap-4 mt-6 items-center md:grid-cols-12 md:mt-14 md:gap-10">
			<div class="md:col-span-6">
				<img src="img/evidencia.png" alt="Resumen de Evidencia científica" class="max-w-xs mx-auto md:max-w-full">
			</div>

			<div class="md:col-span-6">
				<div>
					<p class="md:text-lg lg:text-xl lg:leading-loose">
						<span class="font-bold">Ya sea como material de consulta para los CHALLENGES o para tu consult diaria</span>,
						ponemos a tu disposición este resumen con toda la evidencia científica.
					</p>

					<div class="mt-6 lg:mt-10">
						<Link href="#" class="bg-brand-orange text-sm font-bold leading-none p-4 inline-flex items-center gap-x-1 rounded transition-all select-none hover:opacity-90">
							<i class="ri-download-2-line"></i>
							<span>Descargar</span>
						</Link>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="px-6 pt-14 3xl:px-0">
	<div class="max-w-5xl mx-auto">

		<h3 class="text-brand-green text-2xl font-ropa font-bold text-center md:text-3xl">GANA UNA INSCRIPCIÓN AL 45º CONGRESO NACIONAL DE SEMERGEN</h3>

		<h4 class="text-brand-orange text-lg font-ropa font-bold leading-tight text-center max-w-4xl mx-auto mt-6 sm:text-xl sm:leading-tight md:text-2xl md:leading-tight">¡Completa los 3 CHALLENGES! Por cada uno conseguirás una participacieon al sorteo de 4 entradas para el Congreso Semergen.<br>
		Haz todos los CAHLLENGES y consigue una participación extra ¡Suerte!</h4>

		<div class="grid gap-6 mt-14 items-center md:grid-cols-12 md:mt-14 md:gap-10">
			<div class="md:col-span-6">
				<img src="img/congreso-nacional-45.png" alt="Resumen de Evidencia científica" class="max-w-xs mx-auto md:max-w-full">
			</div>

			<div class="space-y-3 text-center md:text-left md:col-span-6 md:space-y-6">
				<p class="font-ropa text-xl leading-tight md:text-2xl md:leading-tight lg:pt-6">
					<span class="font-bold">El congreso</span> se celebrará en <span class="font-bold">Valencia</span> de los días <span class="font-bold">18 al 21 de octubre de 2023.</span>
				</p>

				<p class="text-sm">Los ganadores se anunciarán el <span class="font-bold">xxx</span> y recibirán una comunicación por email.</p>

				<div class="pt-2">
					<Link href="#" class="bg-brand-green text-white text-sm font-bold leading-none p-4 inline-flex items-center gap-x-1 rounded transition-all select-none hover:opacity-90">
						<span>Bases legales</span>
					</Link>
				</div>
			</div>
		</div>
	</div>
</section>




<div id="coordinacion-cientifica" class=""/>

<section class="px-6 py-20 3xl:px-0">
	<div class="max-w-5xl mx-auto">

		<h3 class="text-brand-green text-2xl font-ropa font-bold text-center md:text-3xl">COORDINACIÓN CIENTÍFICA</h3>

		<div class="bg-brand-green-100 p-6 mt-7 rounded-lg">
			<div class="grid gap-6 items-center md:grid-cols-12 md:gap-10">
				<div class="md:col-span-6">
					<img src="img/vicente-pascual.jpeg" alt="Dr. Vicente Pascual" class="max-w-xs mx-auto rounded-md md:max-w-full">
				</div>

				<div class="space-y-1 text-center md:text-left md:col-span-6">
					<p class="text-brand-green text-xl font-bold">Dr. Vicente Pascual</p>
					<p class="text-sm md:text-base">
						<span class="font-bold">Médico de Familia y Comunitaria del E.A.P</span> Centro de Salud Palleter, profesor asociado de la Universidad CEU-Cardenal Herrera. Castelløon y miembro de los GGTT de Lípidos y de Nutriciøon de SEMERGEN.
					</p>
				</div>
			</div>
		</div>

	</div>
</section>

</PageLayout>
</template>




<style lang="scss" scoped>

</style>