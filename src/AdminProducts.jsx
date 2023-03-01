import { useEffect, useState } from 'react'
import axios from 'axios'
import Swal from 'sweetalert2'
import withReactContent from 'sweetalert2-react-content'
import { show_alert } from './alerts.js'

const AdminProducts = () => {
  const url = 'http://localhost/api-antuca/'
  const [products, setProducts] = useState([])
  const [id, setId] = useState('')
  const [name, setName] = useState('')
  const [price, setPrice] = useState('')
  const [description, setDescription] = useState('')
  const [image, setImage] = useState('')
  const [category, setCategory] = useState('')
  const [operation, setOperation] = useState(1)

  useEffect(() => {
    getProducts()
  }, [])

  const getProducts = async () => {
    const res = await axios.get(`${url}`)
    setProducts(res.data)
  }

  return (
    <div>
      <div class="container mx-auto">
        <a href="#"
          class="mx-auto inline-block rounded bg-blue-500 
          px-4 py-2 text-xs font-medium text-white hover:bg-blue-700"
        >
          <i className='fa-solid fa-circle-plus'></i>&nbsp; Agregar Producto
        </a>
      </div>
      <div class="container mx-auto">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
            <thead>
              <tr>
                <th
                  class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
                >
                  Id
                </th>
                <th
                  class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
                >
                  Nombre
                </th>
                <th
                  class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
                >
                  Precio
                </th>
                <th
                  class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
                >
                  Categoria
                </th>
                <th
                  class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
                >
                  Descripcion
                </th>
                <th
                  class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
                >
                  Imagen
                </th>
                <th class="px-4 py-2"></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
              {products.map((product,id) => (
                <tr key={id}>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-900">
                    {product.id}
                  </td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {product.name}
                  </td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {product.price}
                  </td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {product.category}
                  </td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {product.description}
                  </td>
                  <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                    {product.image}
                  </td>
                  <td>
                    <a href="#"
                      class="inline-block rounded bg-yellow-500 
                      px-4 py-2 text-xs font-medium text-white hover:bg-yellow-700"
                    >
                      <i className='fa-solid fa-edit'></i>
                    </a>
                    &nbsp;
                    <a href="#"
                      class="inline-block rounded bg-red-500
                      px-4 py-2 text-xs font-medium text-white hover:bg-red-700"
                    >
                      <i className='fa-solid fa-trash'></i>
                    </a>

                  </td>
                </tr>
              ))
              }
            </tbody>
          </table>
        </div>

      </div>
    </div>
  )
}

export default AdminProducts