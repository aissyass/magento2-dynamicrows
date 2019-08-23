
# Ui Components: DynamicRows components in Magento 2  
  
- Compatible: Magento **2.1**, **2.2**, **2.3**  
  
DynamicRows components are a list of records where users can add new records, edit their records, change their display positions, and navigate through the collection.  
We can see the DynamicRows in some of the default pages in Magento 2 Admin Panel.  
  
  
***Important to note:*** The data will be processed by deleting all items in the table and then re-adding those items and the new items. The purpose of this step is to store items in the correct position previously sorted by the users. It will only apply if your database is small to medium, and for large databases, this solution will **slow down the saving process**.      
  
You can see the treatment in Save Action:      
    ``  
 \PHPAISS\DynamicRows\Controller\Adminhtml\Row\Save.php ``      
 
How DynamicRows looks like:  
![](https://user-images.githubusercontent.com/32301699/63588108-957c4f00-c59d-11e9-96a1-b190eda9baa1.jpg)  

![](https://user-images.githubusercontent.com/32301699/63588376-3965fa80-c59e-11e9-949e-69de0e81b327.jpg)