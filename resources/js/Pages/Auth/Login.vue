<script setup>
import { ref } from 'vue'
import { Link, useForm } from '@inertiajs/inertia-vue3'

import PageLayout from '@/Layouts/PageLayout.vue'
import Checkbox from '@/Components/Form/Checkbox.vue'
import InputError from '@/Components/Form/InputError.vue'
import InputLabel from '@/Components/Form/InputLabel.vue'
import BtnCTA from '@/Components/BtnCallToAction.vue'
import TextInput from '@/Components/Form/TextInput.vue'
import { useStore } from '@/store/mainStore.js'


const { intro } = defineProps({
	canResetPassword: Boolean,
	status: String,
});

const form = useForm({
	usu_email: '',
	usu_password: '',
	remember: false,
})

const store = useStore()
let code_error = ref(false)

const submit = () => {
	form.post(route('login'), {
		onSuccess: (res) => {
			store.setUser(res.props.auth.user)
		},
		onFinish: () => {
			form.reset('password')
		},
		onError: () => {
			console.log(form.errors)
			code_error.value = true;
		}
	})
}

const clearErrors = () => {
	code_error.value = false
}
</script>

<template>
<PageLayout>
	<section id="login" class="px-6 py-14 3xl:px-0">
		<div class="max-w-5xl mx-auto">
			<div class="text-white max-w-md">

				<h2 class="text-2xl leading-tight font-bold select-none">Inicia sesión o regístrate para participar en los Challenges y tener acceso a todo el contenido.</h2>

				<div class="mt-3">
					Si ya estás dado o dada de alta, introduce tu usuario y contraseña. 
					En caso contrario <Link :href="route('register')" class="font-bold">Regístrate</Link>
				</div>

				<form
					@submit.prevent="submit"
					class="max-w-xs">

					<div v-if="(form.errors?.general && code_error)" class="my-7">
						<div class="bg-[#FFF7D8] px-5 py-3 select-none rounded-xl">
							<div class="flex gap-x-10 items-center">
								<div class="font-bold leading-tight flex-1">
									<p v-if="form.errors?.general">{{ form.errors?.general }}</p>

									Por favor,
									<Link :href="route('contact')" class="text-primary font-bold hover:underline">
									Contacta
									</Link>
									con nosotros.
								</div>

								<div class="w-10">
									<button @click.prevent="clearErrors()"  class="hover:opacity-90">
									</button>
								</div>
							</div>
						</div>
					</div>

					<div class="mt-7">
						<TextInput
							id="email"
							type="email"
							placeholder="email"
							class="!border-white mt-1 block w-full"
							v-model="form.usu_email"
							required
							autofocus
							autocomplete="username"
							:rounded="true"
							/>

						<InputError class="mt-2" :message="form.errors.usu_email" />
					</div>

					<div class="mt-4">
						<TextInput
							id="password"
							type="password"
							placeholder="contraseña"
							class="!border-white mt-1 block w-full"
							v-model="form.usu_password"
							required
							autocomplete="current-password"
							:rounded="true"
							/>

						<InputError class="mt-2" :message="form.errors.usu_password" />
					</div>

					<div class="pl-2 pt-3">
						<Link
							v-if="canResetPassword"
							:href="route('password.request')"
							class="text-xs leading-none hover:underline">
							¿Olvidaste la contraseña?
						</Link>
					</div>


					<div class="mt-8" :class="{ 'opacity-25 pointer-events-none': form.processing }">
						<BtnCTA
							className="w-full"
							type="submit">
							<span>Entrar</span>
						</BtnCTA>
					</div>

				</form>
			</div>
		</div>
	</section>

</PageLayout>
</template>



<style scoped>
#login{
	background: #298338 url('img/hero-bg.jpeg') no-repeat center right / auto 100%;
}

@media (min-width: 768px){
	#login{
		background: #298338 url('img/hero-bg.jpeg') no-repeat center right / auto 100%;
	}
}
</style>