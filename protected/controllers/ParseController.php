<?php

class ParseController extends Controller
{
       public function actionCreate()
        {
    
           $model=new ParseTest;
           $model->name="sirin";
           $model->age="123";
           
         
           
           if($model->save())
            {
              echo "saved"; 
              echo "<br/	>id:".$model->id;
            }
            else
            {
             $e=$model->getErrors();
             print_r($e);
            }
            
        }
        public function actionView($id)
        {
          $model=ParseTest::model()->findbyPk($id); 
          echo "<pre>Attributes:";
          print_r($model->attributes);
          echo "</pre>";
          
        }
        public function actionUpdate($id)
        {
          $model=ParseTest::model()->findbyPk($id); 
          
          $model->name="Sirin";
          $model->age="24";
          if($model->save())
            {
              echo "saved"; 
              echo "<br/>id:".$model->id;
            }
            else
            {
             $e=$model->getErrors();
             print_r($e);
            }
           $model->name="coool";
           $model->save();
        }
        public function actionAdmin()
        {
           $criteria=new NParseCriteria;
           
           $criteria->compare('name','si');
           
           $criteria->conditions=array(
            //'age'=>array("<",20),
            //'name'=>array("in",array('abc')),
           );
           
          $dataProvider=new NParseDataProvider('ParseTest',array(
                                           'pagination'=>array('pageSize'=>'3'),
                                           'criteria'=>$criteria
                                          ));
          
          //$dataProvider->getData();
          
          /*
          echo "<pre>";
          print_r($data);
          echo "</pre>";
          */
          
          $this->render("admin",array("dataProvider"=>$dataProvider));
        }
        public function actionIndex()
        {
          // $criteria=new NParseCriteria;
           //$criteria->condition="age>10";
           
           $criteria=new NParseCriteria;
           
           
           //$criteria->conditions=array(
            //'age'=>array(">=",1000),
           // 'name'=>array("in",array('abc','sirin')),
           //);
           
           
          
             
          // $criteria->limit=4;
           //  $criteria->order="name";
             //$criteria->offset=4;
           //  $criteria->select="age";
           
          // $criteria->addCond("age","<",150);
           
           $criteria->compare('name','s');
           //$criteria->compare('name','abcdefg');
           //$criteria->compare('name','fffffff',false,"OR");
           
           
           //$criteria->params=CMap::mergeArray($criteria->params,array(':test'=>'123'));
           
           
           
          // echo "condition:".$criteria->condition;
           
           
           
           //exit;
           
           $models=ParseTest::model()->findAll($criteria); 
             $c=ParseTest::model()->count($criteria); 
             //echo "Count:".$c;
           $i=1;
           foreach($models as $model)
            {
             /*
             echo "<hr/><pre>".$i.": id:".$model->id;
             print_r($model->attributes);
             echo "</pre>";
             */
             $i++;
            } 
        
        }
        public function actionDelete($id)
        {
          $model=ParseTest::model()->findbyPk($id); 
          if($model==null)
          {
            echo "No record exist to delete.. with id:".$id; 
          }
          else
          {
            echo "Deleted id:".$id;
            $res=$model->delete($id);
          }
          
        }
        

}