import pandas as pd
from pycaret.classification import *

path = 'AIC_dataset.csv'
df = pd.read_csv(path)

df.head()
df.dtypes
cat_features = ['age', 'feelingnervous', 'panic', 'breathingrapidly', 'sweating', 'troubleinconcentration', 'troubleinsleeping', 'troublewithwork', 'hopeless', 'anger', 'overreact', 'changeineating', 'suicidalthought', 'feelingtired', 'weightgain', 'introvert', 'poppingupstressfulmemory', 'havingnightmares', 'avoidspeopleoractivities', 'feelingnegative', 'blammingyourself', 'hallucinations', 'repetitivebehaviour', 'increasedenergy']

experiment = setup(df, target='Disorder', categorical_features=cat_features)

best_model = compare_models()
predict_model(best_model)
save_model(best_model, model_name='dtc-model')