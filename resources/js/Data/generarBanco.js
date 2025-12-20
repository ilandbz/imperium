import fs from 'fs'
import path from 'path'
import { fileURLToPath } from 'url'

// Necesario para ES Modules en Windows
const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

// Subimos hasta la raíz del proyecto Laravel
const baseDir = path.resolve(__dirname, '../../../../imperium_portal/storage/app/public/bancodeciciones')

let id = 1
const resultado = []

if (!fs.existsSync(baseDir)) {
  console.error('❌ No existe la ruta:', baseDir)
  process.exit(1)
}

const years = fs.readdirSync(baseDir)

years.forEach(year => {
  const yearPath = path.join(baseDir, year)

  if (!fs.statSync(yearPath).isDirectory()) return
  if (!/^\d{4}$/.test(year)) return

  const files = fs.readdirSync(yearPath)

  files.forEach(file => {
    if (!file.toLowerCase().endsWith('.pdf')) return

    resultado.push({
      id: id++,
      year: Number(year),
      titulo: file
        .replace(/\.pdf$/i, '')
        .replace(/_/g, ' ')
        .replace(/\s+/g, ' ')
        .trim(),
      pdf: `/storage/bancodeciciones/${year}/${file}`
    })
  })
})

console.log(
  'export const bancoDecisiones = ' +
  JSON.stringify(resultado, null, 2)
)
