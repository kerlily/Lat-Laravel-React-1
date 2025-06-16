import { BrowserRouter, Route, Routes } from "react-router-dom"
import ProductIndex from "./pages/product"
import PublicLayout from "./layouts/public"

function App() {

  return (
   <>
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<h1>Home</h1>} />

        <Route element={<PublicLayout />}>
        <Route path="/products" element={<ProductIndex />} />
        
         </Route>
        
      </Routes>
    </BrowserRouter>
   </>
  )
}

export default App
