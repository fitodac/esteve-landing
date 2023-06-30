<script setup>
import { watch, onMounted } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'

import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import Loader from '@/Components/Account/Loader.vue'
import SubmitButton from '@/Components/Account/SubmitButton.vue'

import { useStore } from '@/store/mainStore.js'
import { storeToRefs } from 'pinia'

defineProps({ sending: Boolean })

const store = useStore()
const { user } = storeToRefs(store)

const form = useForm({
	usu_nombre: '',
	usu_email: '',
	usu_ape1: '',
	usu_ape2: ''
})

watch(user, val => {
	form.usu_nombre = val.usu_nombre
	form.usu_email = val.usu_email
	form.usu_ape1 = val.usu_ape1
	form.usu_ape2 = val.usu_ape2
})
</script>

<template>
<div class="border-b border-stone-200 text-brand-blue text-sm font-bold pb-2 select-none">Información personal</div>

<form 
	@submit.prevent="onSubmit" 
	:initial-values="form" 
	class="relative"
	:class="{'pointer-events-none opacity-50': sending}">
	
	<Loader v-if="sending" />

	<div class="mt-5">
		<InputLabel for="name" value="Nombre" />

		<TextInput
			id="name"
			type="text"
			class="mt-1 block w-full"
			v-model="form.usu_nombre"
			autocomplete="name"/>

		<InputError class="mt-2" :message="form.errors.usu_nombre" />
	</div>

	<div class="grid md:grid-cols-2 md:gap-x-5">
		<div class="mt-5">
			<InputLabel for="first_last_name" value="Primer apellido" />

			<TextInput
				id="first_last_name"
				type="text"
				class="mt-1 block w-full"
				v-model="form.usu_ape1"
				autocomplete="first_last_name"/>

			<InputError class="mt-2" :message="form.errors.usu_ape1" />
		</div>

		<div class="mt-5">
			<InputLabel for="second_last_name" value="Segundo apellido" />

			<TextInput
				id="second_last_name"
				type="text"
				class="mt-1 block w-full"
				v-model="form.usu_ape2"
				autocomplete="second_last_name"/>

			<InputError class="mt-2" :message="form.errors.usu_ape2" />
		</div>
	</div>

	<div class="mt-6">
		<InputLabel for="email" value="Email" />

		<TextInput
			id="email"
			type="email"
			class="mt-1 block w-full"
			v-model="form.usu_email"
			autocomplete="email"/>

		<InputError class="mt-2" :message="form.errors.usu_email" />
	</div>

	<SubmitButton />

<!-- 



	<div class="grid md:grid-cols-2 md:gap-x-5">

		<div class="mt-7">
			<InputLabel for="first_last_name" value="Primer apellido"/>
			<Field name="usu_ape1" v-slot="{ field, errorMessage }">
				<TextInput
					v-bind="field"
					id="first_last_name"
					type="text"
					class="mt-1 block w-full"
					v-model="form.usu_ape1"
					autocomplete="first_last_name"/>
				<InputError class="mt-2" :message="errorMessage"/>
			</Field>
		</div>

		<div class="mt-7">
			<InputLabel for="second_last_name" value="Segundo apellido"/>
				<TextInput
					id="second_last_name"
					type="text"
					class="mt-1 block w-full"
					v-model="form.usu_ape2"
					autocomplete="second_last_name"/>
		</div>

	</div>

	<div class="mt-7">
		<InputLabel for="email" value="Email"/>
		<Field name="usu_email" v-slot="{ field, errorMessage }">
			<TextInput
				v-bind="field"
				id="email"
				type="email"
				class="mt-1 block w-full"
				v-model="form.usu_email"
				autocomplete="email"/>
				<InputError class="mt-2" :message="errorMessage"/>
		</Field>
	</div>

	
-->
</form> 
</template>