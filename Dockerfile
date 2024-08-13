FROM python
WORKDIR /app
COPY . /app
COPY requirements.txt .
RUN pip install -r requirements.txt
RUN apt-get install tk -y
CMD ["python", "runme.py"]