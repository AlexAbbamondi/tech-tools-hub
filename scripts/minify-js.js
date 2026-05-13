const fs = require("fs");
const path = require("path");
const { execFileSync } = require("child_process");

const jsDir = path.join(__dirname, "../assets/js");

function getJsFiles(dir) {
	const entries = fs.readdirSync(dir, { withFileTypes: true });

	return entries.flatMap((entry) => {
		const fullPath = path.join(dir, entry.name);

		if (entry.isDirectory()) {
			return getJsFiles(fullPath);
		}

		if (
			entry.isFile() &&
			entry.name.endsWith(".js") &&
			!entry.name.endsWith(".min.js")
		) {
			return [fullPath];
		}

		return [];
	});
}

const files = getJsFiles(jsDir);

files.forEach((file) => {
	const output = file.replace(/\.js$/, ".min.js");

	execFileSync(
		`npx terser "${file}" -c -m -o "${output}"`,
		{
			stdio: "inherit",
			shell: true,
		}
	);

	console.log(`Minified JS: ${path.relative(process.cwd(), output)}`);
});