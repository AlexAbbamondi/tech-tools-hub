const fs = require("fs");
const path = require("path");
const { execFileSync } = require("child_process");

const cssDir = path.join(__dirname, "../assets/css");

function getCssFiles(dir) {
	const entries = fs.readdirSync(dir, { withFileTypes: true });

	return entries.flatMap((entry) => {
		const fullPath = path.join(dir, entry.name);

		if (entry.isDirectory()) {
			return getCssFiles(fullPath);
		}

		if (
			entry.isFile() &&
			entry.name.endsWith(".css") &&
			!entry.name.endsWith(".min.css")
		) {
			return [fullPath];
		}

		return [];
	});
}

const files = getCssFiles(cssDir);

files.forEach((file) => {
	const output = file.replace(/\.css$/, ".min.css");

	execFileSync(
		`npx lightningcss --minify "${file}" -o "${output}"`,
		{
			stdio: "inherit",
			shell: true,
		}
	);

	console.log(`Minified CSS: ${path.relative(process.cwd(), output)}`);
});