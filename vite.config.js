import fs from 'fs';
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import {defineConfig} from 'vite'
import {homedir} from 'os'
import {resolve} from 'path'

let host = 'filament.secuna.local.mh'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
                'resources/js/**',
                'resources/views/**',
            ]
        }),
    ],
    server: detectServerConfig(host),
})

function detectServerConfig(host) {
    let keyPath = resolve(homedir(), `.config/valet/Certificates/${host}.key`)
    let certificatePath = resolve(homedir(), `.config/valet/Certificates/${host}.crt`)

    if (!fs.existsSync(keyPath)) {
        return {}
    }

    if (!fs.existsSync(certificatePath)) {
        return {}
    }

    return {
        hmr: {host},
        host,
        https: {
            key: fs.readFileSync(keyPath),
            cert: fs.readFileSync(certificatePath),
        },
    }
}