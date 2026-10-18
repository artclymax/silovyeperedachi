import { defineConfig } from "vite";
import path from "path";
import FullReload from "vite-plugin-full-reload";

const FRONT_DIR = path.resolve(__dirname);
const SRC_DIR = path.resolve(FRONT_DIR, "src");
const THEME_DIR = path.resolve(FRONT_DIR, "..");

const PHP_GLOB = [
	path.resolve(THEME_DIR, "*.php").replace(/\\/g, "/"),
	path.resolve(THEME_DIR, "templates/**/*.php").replace(/\\/g, "/"),
	path.resolve(THEME_DIR, "parts/**/*.php").replace(/\\/g, "/"),
];

export default defineConfig(({ mode }) => {
	const isDev = mode === "development";
	const isUnminified = mode === "unminified";

	// Жёсткое определение: минифицировать ТОЛЬКО если это НЕ dev и НЕ unminified
	const shouldMinify = !isDev && !isUnminified;

	return {
		root: SRC_DIR,
		publicDir: path.resolve(__dirname, "public"),

		// === КЛЮЧЕВОЕ ИЗМЕНЕНИЕ: Отключаем минификацию CSS на корневом уровне ===
		css: {
			minify: !shouldMinify, // Если shouldMinify=false, minify будет false
		},

		server: {
			host: "localhost",
			port: 5173,
			strictPort: true,
			cors: true,
			fs: { allow: [FRONT_DIR, THEME_DIR] },
		},

		build: {
			// Дублируем запрет на уровне сборки
			minify: shouldMinify ? "esbuild" : false,
			cssMinify: shouldMinify ? "esbuild" : false,
			sourcemap: isDev || isUnminified,
			outDir: path.resolve(THEME_DIR, "assets"),
			emptyOutDir: true,
			manifest: false,

			rollupOptions: {
				input: path.resolve(SRC_DIR, "main.js"),
				output: {
					entryFileNames: "main.js",
					chunkFileNames: "chunks/[name].js",
					assetFileNames: (assetInfo) => {
						const name = assetInfo.name || "";
						if (name.endsWith(".css")) return "style.css";
						return "assets/[name][extname]";
					},
					inlineDynamicImports: true,
				},
			},
		},

		plugins: [isDev && FullReload(PHP_GLOB)].filter(Boolean),

		resolve: {
			alias: { "@": SRC_DIR },
		},
	};
});
