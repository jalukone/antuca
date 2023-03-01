import { BrowserRouter , Routes, Route } from 'react-router-dom'
import Header from './Header'
import Home from './Home'
import AdminProducts from './AdminProducts'

function App() {


    return (
        <BrowserRouter>
            <Header />
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/crud" element={<AdminProducts/>} />
                <Route path="*" element={<h1>404 Not Found</h1>} />

            </Routes>
        </BrowserRouter>
    )
}

export default App