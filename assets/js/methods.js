const cloudName ="onlinecoder"
const presetKey="imgVariation"


const uploadFile=async(file,cb)=>{

   const formData = new FormData();
        formData.append("file",file)
        formData.append("upload_preset",presetKey)
    try {
    const res = await  axios.post(`https://api.cloudinary.com/v1_1/${cloudName}/image/upload`,formData,{
        
        headers:{
            "Content-Type":"multipart/form-data"
        },
        onUploadProgress:(e)=>{

            if(e.total){
                let loaded = Math.round((100*e?.loaded)/e.total);
              if(cb)
                cb(loaded,"")

            }            

                    
        }
    })
    if(cb){
         cb(100,res?.data?.secure_url);
    }
 return {url:res?.data?.secure_url,status:200};
    

}catch(err){
    console.log(err);
    return {url:"",success:500};
}
}