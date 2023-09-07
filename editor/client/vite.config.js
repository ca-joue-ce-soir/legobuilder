import { defineConfig } from 'vite';
import { resolve } from 'path';
import react from  '@vitejs/plugin-react';

export default defineConfig({
    plugins: [react()],
    server: {
        host: true
    },
    build: {
        manifest: true,
        lib: {
            name: 'legobuilder',
            fileName: 'legobuilder',
            entry: resolve(__dirname, 'src/index.tsx'),
        }
    }
});